<?php

namespace CodeBureau\FirstAgendaApi;

use CodeBureau\FirstAgendaApi\Messages\ApiDownloadLink;
use CodeBureau\FirstAgendaApi\Messages\Decision;
use CodeBureau\FirstAgendaApi\Messages\Document;
use CodeBureau\FirstAgendaApi\Messages\Presentation;
use CodeBureau\FirstAgendaApi\Messages\ApiAgenda;
use CodeBureau\FirstAgendaApi\messages\ApiAgendaItem;
use CodeBureau\FirstAgendaApi\Messages\ApiResponse;
use CodeBureau\FirstAgendaApi\Messages\ApiCommittee;
use DateTime;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class FirstAgendaService
 * @package CodeBureau\FirstAgendaApi
 */
class FirstAgendaService
{

    /**
     * @var TokenService
     */
    private $tokenService;

    /**
     * @var Client
     */
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
                'timeout' => 2.0,
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
     * @function getAgendasByCommittee
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/agenda/list/bycommittee/{committeeUid}
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param $committeeUid
     * @param string $pageNumber
     * @param string $pageSize
     * @param string $sortDirection
     * @param string $agendaMeetingBeginFrom
     * @param string $agendaMeetingBeginTo
     * @param string $searchContent
     * @return array
     */
    public function getAgendasByCommittee($committeeUid, $pageNumber = null, $pageSize = null, $sortDirection = null, $agendaMeetingBeginFrom = null, $agendaMeetingBeginTo = null, $searchContent = null): array
    {
        if (!function_exists('http_build_query')) {
            $response = $this->makeGETRequest('agenda/list/bycommittee/' . $committeeUid);
            return $this->mapJSONtoAgenda($response->getMessage());
        }

        $params = $this->generateParams($pageNumber, $pageSize, $sortDirection, $agendaMeetingBeginFrom, $agendaMeetingBeginTo, $searchContent);

        $response = $this->makeGETRequest('agenda/list/bycommittee/' . $committeeUid . $params);
        return $this->mapJSONtoAgenda($response->getMessage());
    }

    /**
     * @function getAgendasByOrganization
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/agenda/list/byorganisation/{organisationUid}
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
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
        if (!function_exists('http_build_query')) {
            $response = $this->makeGETRequest('agenda/list/byorganisation/' . $organizationUid);
            return $this->mapJSONtoAgenda($response->getMessage());
        }

        $params = $this->generateParams($pageNumber, $pageSize, $sortDirection, $agendaMeetingBeginFrom, $agendaMeetingBeginTo, $searchContent);

        $response = $this->makeGETRequest('agenda/list/byorganisation/' . $organizationUid . $params);
        return $this->mapJSONtoAgenda($response->getMessage());
    }

    /**
     * @function getAgenda
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/agenda/{agendaUid}
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param $agendaUid
     * @return ApiAgenda|null
     */
    public function getAgenda($agendaUid): ?ApiAgenda
    {
        $response = $this->makeGETRequest('agenda/' . $agendaUid);

        if ($response->getStatus() === 404) {
            return null;
        }

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
     * @function getAgendaItem
     *
     * This function calls the endpoint
     *
     *  /api/integration/publication/agendaitem/{agendaItemUid}
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param $agendaItemUid
     * @param null $includePrefixOnClosedItems
     * @param null $preserveInlineStyling
     * @return ApiAgendaItem
     */
    public function getAgendaItem($agendaItemUid, $includePrefixOnClosedItems = null, $preserveInlineStyling = null): ApiAgendaItem
    {
        if (function_exists('http_build_query')) {
            // Build Params
            $params = $this->generateParamsForAgendaItems($includePrefixOnClosedItems, $preserveInlineStyling);

            $response = $this->makeGETRequest('agendaitem/' . $agendaItemUid . $params);
        } else {
            $response = $this->makeGETRequest('agendaitem/' . $agendaItemUid);
        }

        $item = $response->getMessage();
        $agendaItem = new ApiAgendaItem($item->Uid);
        $agendaItem
            ->setAgendaUid($item->AgendaUid)
            ->setNumber($item->Number)
            ->setSorting($item->Sorting)
            ->setIsOpen($item->IsOpen)
            ->setCaseNumber($item->CaseNumber)
            ->setSourceId($item->SourceId)
            ->setCaption($item->Caption)
            ->setSection($item->Section);

        if (count($item->Presentations) > 0) {
            foreach ($item->Presentations as $presentationObj) {
                $presentation = new Presentation();
                $presentation
                    ->setType($presentationObj->Type)
                    ->setTitle($presentationObj->Title)
                    ->setContent($presentationObj->Content)
                    ->setDocumentId($presentationObj->DocumentUid);
                $agendaItem->addPresentation($presentation);
            }
        }

        if (count($item->Documents) > 0) {
            foreach ($item->Documents as $documentObj) {
                $document = new Document();
                $document
                    ->setTitle($documentObj->Title)
                    ->setOrder($documentObj->Order)
                    ->setUuid($documentObj->Uid);
                $agendaItem
                    ->addDocuments($document);
            }
        }

        if (isset($item->ItemDecision)) {
            $decision = new Decision();
            $decision
                ->setCreated(Carbon::parse($item->ItemDecision->Created))
                ->setUpdated(Carbon::parse($item->ItemDecision->Updated))
                ->setText($item->ItemDecision->Text ?: "");
            $agendaItem->setDecisionItem($decision);
        }

        return $agendaItem;
    }

    /**
     * @function getCommitteesInOrganizations
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/committee/list/byorganisation/{organisationUid}
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param string $uuid
     * @param int $pageNumber
     * @param int $pageSize
     * @param int $sortDirection
     * @return array
     */
    public function getCommitteesInOrganizations(string $uuid, $pageNumber = 0, $pageSize = 15, $sortDirection = 0): array
    {
        if (!function_exists('http_build_query')) {
            $response = $this->makeGETRequest('committee/list/byorganisation/' . $uuid);
            $organizations = $response->getMessage();
            return $this->mapJSONtoCommittee($organizations);
        }

        $params = $this->generateParams($pageNumber, $pageSize, $sortDirection, null, null, null);

        $response = $this->makeGETRequest('committee/list/byorganisation/' . $uuid . $params);
        $organizations = $response->getMessage();
        return $this->mapJSONtoCommittee($organizations);
    }

    /**
     * @function getAllCommitteesAvailable
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/committee/list
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param null $sortDirection
     * @return array
     */
    public function getAllCommitteesAvailable($pageNumber = 0, $pageSize = 15, $sortDirection = 0): array
    {
        if (!function_exists('http_build_query')) {
            $response = $this->makeGETRequest('committee/list');
            $rawCommittees = $response->getMessage();
            return $this->mapJSONtoCommittee($rawCommittees);
        }

        $params = $this->generateParams($pageNumber, $pageSize, $sortDirection, null, null, null);

        $response = $this->makeGETRequest('committee/list' . $params);
        $rawCommittees = $response->getMessage();
        return $this->mapJSONtoCommittee($rawCommittees);
    }

    /**
     * @function getCorporationDetails
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/corporation
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     */
    public function getCorporationDetails()
    {
        $response = $this->makeGETRequest('corporation');
        return $response->getMessage();
    }

    /**
     * @function getPDFDocument
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/corporation
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param $documentUid
     */
    public function getPDFDocument($documentUid)
    {
        TODO:
    }

    /**
     * @function getPDFDocumentUrl
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/document/
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param $documentUid
     * @return ApiDownloadLink : Returns a temporary download URL for a PDF representation of the document identified by documentUid
     */
    public function getPDFDocumentUrl($documentUid): ApiDownloadLink
    {
        $response = $this->makeGETRequest('/api/integration/publication/document/' . $documentUid . '/url');
        $message = $response->getMessage();

        $download = new ApiDownloadLink();
        $download
            ->setUrl($message->DownloadUrl)
            ->setExpiration(Carbon::parse($message->Expiration))
            ->setErrorCode($message->ErrorCode)
            ->setErrorMessage($message->ErrorMessage)
            ->setHasError($message->HasError);

        return $download;
    }

    /**
     * @function getAllOrganizations
     *
     * This function calls the endpoint
     *
     * /api/integration/publication/organisation/list
     *
     * The function supports all the default properties, for more information
     * @see https://prepare.firstagenda.com/api/publication/swagger/index
     *
     * @param int $pageNumber :
     * @param int $pageSize :
     * @param null $sortDirection :
     */
    public function getAllOrganizations($pageNumber = 0, $pageSize = 15, $sortDirection = null)
    {
        if (!function_exists('http_build_query')) {
            $response = $this->makeGETRequest('organisation/list');
            return $response->getMessage();
        }

        $params = $this->generateParams($pageNumber, $pageSize, $sortDirection, null, null, null);

        $response = $this->makeGETRequest('organisation/list' . $params);
        return $response->getMessage();
    }

    /**
     * @function mapJSONtoCommittee
     *
     * This is a private helper function that maps a JSON object to a Committee.
     *
     * @param array $committees : An array of JSON objects
     * @return array : Returns an array of ApiCommittee objects
     */
    private function mapJSONtoCommittee(array $committees): array
    {
        foreach ($committees as $key => $org) {
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
            $committees[$key] = $committee;
        }
        return $committees;
    }

    /**
     * @function mapJSONtoAgenda
     *
     * Helper function to create ApiAgenda objects.
     *
     * @param array $agendas : An array of JSON objects
     * @return array : Returns an array of ApiAgenda objects
     */
    private function mapJSONtoAgenda(array $agendas): array
    {
        foreach ($agendas as $key => $agn) {
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
     * @function generateParams
     *
     * Helper function to generate the params for a number of HTTP GET.
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param $sortDirection
     * @param $agendaMeetingBeginFrom
     * @param $agendaMeetingBeginTo
     * @param $searchContent
     * @return string
     */
    private function generateParams(
        int $pageNumber,
        int $pageSize,
        $sortDirection,
        $agendaMeetingBeginFrom,
        $agendaMeetingBeginTo,
        $searchContent
    ): string
    {
        // Build Params
        $paramsData = [];
        if (isset($pageNumber) && is_numeric($pageNumber)) {
            $paramsData['pageNumber'] = $pageNumber;
        }

        if (isset($pageSize) && !empty($pageSize)) {
            $paramsData['pageSize'] = $pageSize;
        }

        if (isset($sortDirection) && is_numeric($sortDirection)) {
            $paramsData['sortDirection'] = $sortDirection;
        }

        if (isset($agendaMeetingBeginFrom) && $agendaMeetingBeginFrom instanceof DateTime) {
            $paramsData['agendaMeetingBeginFrom'] = $agendaMeetingBeginFrom;
        }

        if (isset($agendaMeetingBeginTo) && $agendaMeetingBeginTo instanceof DateTime) {
            $paramsData['agendaMeetingBeginTo'] = $agendaMeetingBeginTo;
        }

        if (isset($searchContent) && is_string($searchContent)) {
            $paramsData['searchContent'] = $searchContent;
        }

        return '?' . http_build_query($paramsData);
    }

    /**
     * @function generateParamsForAgendaItems
     *
     * Small helper function to create the params for the HTTP GET on AgendaItems.
     *
     * @param $includePrefixOnClosedItems
     * @param $preserveInlineStyling
     * @return string
     */
    private function generateParamsForAgendaItems($includePrefixOnClosedItems, $preserveInlineStyling): string
    {
        $paramsData = [];

        if (isset($includePrefixOnClosedItems) && is_bool($includePrefixOnClosedItems)) {
            $paramsData['includePrefixOnClosedItems'] = $includePrefixOnClosedItems;
        }

        if (isset($preserveInlineStyling) && is_bool($preserveInlineStyling)) {
            $paramsData['preserveInlineStyling'] = $preserveInlineStyling;
        }

        return '?' . http_build_query($paramsData);
    }


    /**
     * @function makeGETRequest
     *
     * This function make a HTTP GET call to the given url.
     *
     * @param $url : The URL to be called.
     * @return ApiResponse : The response object.
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
