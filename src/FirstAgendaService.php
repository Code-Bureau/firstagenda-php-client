<?php

namespace CodeBureau\FirstAgendaApi;

use CodeBureau\FirstAgendaApi\Messages\Agenda;
use CodeBureau\FirstAgendaApi\Messages\ApiResponse;
use Carbon\Carbon;
use CodeBureau\FirstAgendaApi\Messages\Committee;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

/**
 * Class FirstAgendaService
 * @package CodeBureau\FirstAgendaApi
 */
class FirstAgendaService {

    private $tokenService;
    private $client;

    /**
     * FirstAgendaService constructor.
     */
    public function __construct()
    {
        $this->tokenService = new TokenService();
        $this->client = new Client(
            [
                'base_uri' => 'https://prepare.firstagenda.com/api/integration/publication/',
                'timeout'  => 2.0,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Cache-Control' => 'no-cache'
                ]
            ]
        );
    }

    /**
     * @param $committeeUid
     * @param string $pageNumber
     * @param string $pageSize
     * @param string $sortDirection
     * @param string $agendaMeetingBeginFrom
     * @param string $agendaMeetingBeginTo
     * @param string $searchContent
     * @return mixed|null
     */
    public function getAgendasByCommittee($committeeUid, $pageNumber = '', $pageSize = '', $sortDirection = '', $agendaMeetingBeginFrom = '', $agendaMeetingBeginTo = '', $searchContent = '')
    {
        $response = $this->makeGETRequest('agenda/list/bycommittee/' . $committeeUid);
        $agendas = $response->getMessage();
        foreach($agendas as $key => $agn) {
            $agenda = new Agenda();
            $agenda
                ->setAgendaUid($agn->AgendaUid)
                ->setOrganisationUid($agn->OrganisationUid)
                ->setName($agn->Name)
                ->setSourceId($agn->SourceId)
                ->setElasticSearchResults($agn->ElasticSearchResults)
                ->setMeetingBeginFromUtc($agn->MeetingBeginFromUtc)
                ->setMeetingEndUtc($agn->MeetingEndUtc)
                ->setReleasedDate($agn->ReleasedDate)
                ->setMinutesOfMeeting($agn->MinutesOfMeeting)
                ->setMeetingLocation($agn->MeetingLocation);
            $agendas[$key] = $agenda;
        }
        return $agendas;
    }

    /**
     * TODO:
     *
     * @param $organizationUid
     * @param int $pageNumber
     * @param int $pageSize
     * @param int $sortDirection
     * @param null $agendaMeetingBeginFrom
     * @param null $agendaMeetingBeginTo
     * @param null $searchContent
     */
    public function getAgendasByOrganization($organizationUid, $pageNumber = 0, $pageSize = 15, $sortDirection = 0, $agendaMeetingBeginFrom = null, $agendaMeetingBeginTo = null, $searchContent = null)
    {

    }

    /**
     * TODO:
     *
     * @param $agendaUid
     */
    public function getAgenda($agendaUid)
    {

    }

    /**
     * TODO:
     *
     * @param $agendaItemUid
     * @param null $includePrefixOnClosedItems
     * @param null $preserveInlineStyling
     */
    public function getAgendaItem($agendaItemUid, $includePrefixOnClosedItems = null, $preserveInlineStyling = null )
    {

    }

    /**
     * @param string $uuid
     * @param string $corporationUuid
     * @param Carbon|null $publicationDate
     * @return array
     * @throws Exception
     */
    public function getCommitteesInOrganizations($uuid = null, $corporationUuid = '', Carbon $publicationDate = null): array
    {
        if (empty($uuid)) {
            throw new Exception('Missing parameters UUID');
        }

        $response = $this->makeGETRequest('committee/list/byorganisation/' . $uuid);
        $organizations = $response->getMessage();
        foreach($organizations as $key => $org){
            $committee = new Committee();
            $committee
                ->setName($org->Name)
                ->setSourceId($org->SourceId)
                ->setIsPublic($org->IsPublic)
                ->setIsHistorical($org->IsHistorical)
                ->setShowPublicCaptionForClosedItems($org->ShowPublicCaptionForClosedItems)
                ->setShowPublicDecisionForClosedItems($org->ShowPublicDecisionForClosedItems)
                ->setCommitteeUid($org->CommitteeUid)
                ->setOrganisationUid($org->OrganisationUid);
            $organizations[$key] = $committee;
        }
        return $organizations;

    }

    /**
     * TODO:
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param null $sortDirection
     */
    public function getAllCommitteesAvailable($pageNumber = 0, $pageSize = 15, $sortDirection = null)
    {

    }

    /**
     * TODO:
     */
    public function getCorporationDetails()
    {

    }

    /**
     * TODO:
     *
     * @param $documentUid
     */
    public function getPDFDocument($documentUid)
    {

    }

    /**
     * TODO:
     *
     * @param $documentUid
     */
    public function getPDFUrl($documentUid)
    {

    }

    /**
     * TODO:
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param null $sortDirection
     */
    public function getAllOrganizations($pageNumber = 0, $pageSize = 15, $sortDirection = null)
    {

    }

    /**
     * @param $url
     * @return ApiResponse
     */
    private function makeGETRequest($url): ApiResponse
    {
        $authToken = $this->tokenService->getAuthToken();

        try {
            $response = $this->client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $authToken->getToken(),
                ]
            ]);

            return new ApiResponse($response->getStatusCode(), json_decode($response->getBody()->getContents()));
        } catch (GuzzleException $guzzleException) {
            return new ApiResponse($guzzleException->getCode(), $guzzleException->getMessage());
        }
    }
}
