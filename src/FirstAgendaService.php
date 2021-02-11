<?php

namespace CodeBureau\FirstAgendaApi;

use Carbon\Carbon;
use CodeBureau\FirstAgendaApi\Messages\ApiAgenda;
use CodeBureau\FirstAgendaApi\messages\ApiAgendaItem;
use CodeBureau\FirstAgendaApi\Messages\ApiResponse;
use CodeBureau\FirstAgendaApi\Messages\ApiCommittee;
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
     *
     * @param null $clientId
     * @param null $clientSecret
     */
    public function __construct($clientId = null, $clientSecret = null)
    {
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

        if (isset($clientId) || isset($clientSecret)) {
            $this->tokenService = new TokenService($clientId, $clientSecret);
        } else {
            $this->tokenService = new TokenService();
        }
    }

    /**
     * @param $committeeUid
     * @param string $pageNumber
     * @param string $pageSize
     * @param string $sortDirection
     * @param string $agendaMeetingBeginFrom
     * @param string $agendaMeetingBeginTo
     * @param string $searchContent
     * @return array
     */
    public function getAgendasByCommittee($committeeUid, $pageNumber = '', $pageSize = '', $sortDirection = '', $agendaMeetingBeginFrom = '', $agendaMeetingBeginTo = '', $searchContent = ''): array
    {
        $response = $this->makeGETRequest('agenda/list/bycommittee/' . $committeeUid);
        return $this->mapJSONtoAgenda($response->getMessage());
    }

    /**
     *
     * @param $organizationUid
     * @param int $pageNumber
     * @param int $pageSize
     * @param int $sortDirection
     * @param null $agendaMeetingBeginFrom
     * @param null $agendaMeetingBeginTo
     * @param null $searchContent
     * @return array
     */
    public function getAgendasByOrganization($organizationUid, $pageNumber = 0, $pageSize = 15, $sortDirection = 0, $agendaMeetingBeginFrom = null, $agendaMeetingBeginTo = null, $searchContent = null): array
    {
        $response = $this->makeGETRequest('agenda/list/byorganisation/' . $organizationUid);
        return $this->mapJSONtoAgenda($response->getMessage());
    }

    /**
     * @param $agendaUid
     * @return ApiAgenda
     */
    public function getAgenda($agendaUid): ApiAgenda
    {
        $response = $this->makeGETRequest('agenda/' . $agendaUid);
        $agn = $response->getMessage();
        $items = collect($agn->Items)->map(function ($item) {
            $a = new ApiAgendaItem($item->Uid);
            return $a
                ->setAgendaUid($item->AgendaUid)
                ->setNumber($item->Number)
                ->setIsOpen($item->IsPublic)
                ->setCaseNumber($item->CaseNumber)
                ->setSourceId($item->SourceId)
                ->setCaption($item->Caption);
        });
        $agenda = new ApiAgenda();
        $agenda
            ->setAgendaUid($agn->Uid)
            ->setCommitteeName($agn->CommitteeName)
            ->setCommitteeUid($agn->CommitteeUid)
            ->setName($agn->Name)
            ->setSourceId($agn->SourceId)
            ->setMeetingBeginUtc($agn->MeetingBeginUtc)
            ->setMeetingEndUtc($agn->MeetingEndUtc)
            ->setMeetingLocation($agn->MeetingLocation)
            ->setReleasedDate($agn->ReleasedDate)
            ->setReleasedBy($agn->ReleasedBy)
            ->setStatus($agn->Status)
            ->setMinutesOfMeeting($agn->IsMinuteOfMeeting)
            ->setIsPublic($agn->IsPublic)
            ->setDescription($agn->Description)
            ->setNumberOfAttendees($agn->NumberOfAttendees)
            ->setNumberOfAbsentees($agn->NumberOfAbsentees)
            ->setNumberOfCancellations($agn->NumberOfCancellations)
            ->setItems($items->toArray());

        return $agenda;
    }

    /**
     * @param $agendaItemUid
     * @param null $includePrefixOnClosedItems
     * @param null $preserveInlineStyling
     * @return ApiAgendaItem
     */
    public function getAgendaItem($agendaItemUid, $includePrefixOnClosedItems = null, $preserveInlineStyling = null ): ApiAgendaItem
    {
        $response = $this->makeGETRequest('agendaitem/' . $agendaItemUid);
        $item = $response->getMessage();
        $agendaItem = new ApiAgendaItem($item->Uid);
        $agendaItem
            ->setAgendaUid($item->AgendaUid)
            ->setNumber($item->Number)
            ->setSorting($item->Sorting)
            // ->setIsOpen($item->IsOpen)
            ->setCaseNumber($item->CaseNumber)
            ->setSourceId($item->SourceId)
            ->setCaption($item->Caption);
            // ->setSection($item->Section)
            // ->setPresentations($item->Presentations)
            // ->setDocuments($item->Documents)
            // ->setItemDecision($item->ItemDecision)

        return $agendaItem;
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
            $committee = new ApiCommittee();
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
     * @param array $agendas
     * @return array
     */
    private function mapJSONtoAgenda(array $agendas): array
    {
        foreach($agendas as $key => $agn) {
            $agenda = new ApiAgenda();
            $agenda
                ->setAgendaUid($agn->AgendaUid)
                ->setOrganisationUid($agn->OrganisationUid)
                ->setName($agn->Name)
                ->setSourceId($agn->SourceId)
                ->setElasticSearchResults($agn->ElasticSearchResults)
                ->setMeetingEndUtc($agn->MeetingEndUtc)
                ->setReleasedDate($agn->ReleasedDate)
                ->setMinutesOfMeeting($agn->MinutesOfMeeting)
                ->setMeetingLocation($agn->MeetingLocation);

            if (isset($agn->MeetingBeginFromUtc)) {
                $agenda->setMeetingBeginUtc($agn->MeetingBeginFromUtc);
            } else {
                $agenda->setMeetingBeginUtc($agn->MeetingBeginUtc);
            }

            $agendas[$key] = $agenda;
        }
        return $agendas;
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
