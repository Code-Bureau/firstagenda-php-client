<?php

namespace CodeBureau\FirstAgendaApi\Messages;

/**
 * Class Agenda
 *
 * This class is a combination of the different response type, that
 * are described in the Swagger documentation.
 *
 * @link https://prepare.firstagenda.com/api/publication/swagger/index#/
 *
 * @package CodeBureau\FirstAgendaApi\Messages
 */
class ApiAgenda
{
    private $agendaUid;
    private $organisationUid;
    private $committeeName;
    private $committeeUid;
    private $name;
    private $sourceId;
    private $highLight;
    private $elasticSearchResults;
    private $meetingBeginUtc;
    private $meetingEndUtc;
    private $releasedDate;
    private $releasedBy;
    private $status;
    private $isPublic;
    private $minutesOfMeeting;
    private $meetingLocation;
    private $description;
    private $numberOfAttendees;
    private $numberOfAbsentees;
    private $numberOfCancellations;
    private $meetingAttendees;
    private $items;

    /**
     * Agenda constructor.
     */
    public function __construct()
    {
        $this->agendaUid = null;
        $this->organisationUid = null;
        $this->committeeName = null;
        $this->committeeUid = null;
        $this->name = null;
        $this->sourceId = null;
        $this->highLight = null;
        $this->elasticSearchResults = null;
        $this->meetingBeginUtc = null;
        $this->meetingEndUtc = null;
        $this->releasedDate = null;
        $this->releasedBy = null;
        $this->status = null;
        $this->isPublic = null;
        $this->minutesOfMeeting = null;
        $this->meetingLocation = null;
        $this->description = null;
        $this->numberOfAbsentees = null;
        $this->numberOfAttendees = null;
        $this->numberOfCancellations = null;
        $this->meetingAttendees = [];
        $this->items = [];

    }

    /**
     * @return null
     */
    public function getAgendaUid()
    {
        return $this->agendaUid;
    }

    /**
     * @param mixed $agendaUid
     * @return ApiAgenda
     */
    public function setAgendaUid($agendaUid): ApiAgenda
    {
        $this->agendaUid = $agendaUid;
        return $this;
    }

    /**
     * @return null
     */
    public function getOrganisationUid()
    {
        return $this->organisationUid;
    }

    /**
     * @param mixed $organisationUid
     * @return ApiAgenda
     */
    public function setOrganisationUid($organisationUid): ApiAgenda
    {
        $this->organisationUid = $organisationUid;
        return $this;
    }

    /**
     * @return null
     */
    public function getCommitteeName()
    {
        return $this->committeeName;
    }

    /**
     * @param mixed $committeeName
     * @return ApiAgenda
     */
    public function setCommitteeName($committeeName): ApiAgenda
    {
        $this->committeeName = $committeeName;
        return $this;
    }

    /**
     * @return null
     */
    public function getCommitteeUid()
    {
        return $this->committeeUid;
    }

    /**
     * @param mixed $committeeUid
     * @return ApiAgenda
     */
    public function setCommitteeUid($committeeUid): ApiAgenda
    {
        $this->committeeUid = $committeeUid;
        return $this;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return ApiAgenda
     */
    public function setName($name): ApiAgenda
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param mixed $sourceId
     * @return ApiAgenda
     */
    public function setSourceId($sourceId): ApiAgenda
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @return null
     */
    public function getHighLight()
    {
        return $this->highLight;
    }

    /**
     * @param mixed $highLight
     * @return ApiAgenda
     */
    public function setHighLight($highLight): ApiAgenda
    {
        $this->highLight = $highLight;
        return $this;
    }

    /**
     * @return null
     */
    public function getElasticSearchResults()
    {
        return $this->elasticSearchResults;
    }

    /**
     * @param mixed $elasticSearchResults
     * @return ApiAgenda
     */
    public function setElasticSearchResults($elasticSearchResults): ApiAgenda
    {
        $this->elasticSearchResults = $elasticSearchResults;
        return $this;
    }

    /**
     * @return null
     */
    public function getMeetingBeginUtc()
    {
        return $this->meetingBeginUtc;
    }

    /**
     * @param mixed $meetingBeginUtc
     * @return ApiAgenda
     */
    public function setMeetingBeginUtc($meetingBeginUtc): ApiAgenda
    {
        $this->meetingBeginUtc = $meetingBeginUtc;
        return $this;
    }

    /**
     * @return null
     */
    public function getMeetingEndUtc()
    {
        return $this->meetingEndUtc;
    }

    /**
     * @param mixed $MeetingEndUtc
     * @return ApiAgenda
     */
    public function setMeetingEndUtc($MeetingEndUtc): ApiAgenda
    {
        $this->meetingEndUtc = $MeetingEndUtc;
        return $this;
    }

    /**
     * @return null
     */
    public function getReleasedDate()
    {
        return $this->releasedDate;
    }

    /**
     * @param mixed $releasedDate
     * @return ApiAgenda
     */
    public function setReleasedDate($releasedDate): ApiAgenda
    {
        $this->releasedDate = $releasedDate;
        return $this;
    }

    /**
     * @return null
     */
    public function getReleasedBy()
    {
        return $this->releasedBy;
    }

    /**
     * @param null $releasedBy
     * @return ApiAgenda
     */
    public function setReleasedBy($releasedBy): ApiAgenda
    {
        $this->releasedBy = $releasedBy;
        return $this;
    }

    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null $status
     * @return ApiAgenda
     */
    public function setStatus($status): ApiAgenda
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param null $isPublic
     * @return ApiAgenda
     */
    public function setIsPublic($isPublic): ApiAgenda
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @return null
     */
    public function getMinutesOfMeeting()
    {
        return $this->minutesOfMeeting;
    }

    /**
     * @param mixed $minutesOfMeeting
     * @return ApiAgenda
     */
    public function setMinutesOfMeeting($minutesOfMeeting): ApiAgenda
    {
        $this->minutesOfMeeting = $minutesOfMeeting;
        return $this;
    }

    /**
     * @return null
     */
    public function getMeetingLocation()
    {
        return $this->meetingLocation;
    }

    /**
     * @param mixed $meetingLocation
     * @return ApiAgenda
     */
    public function setMeetingLocation($meetingLocation): ApiAgenda
    {
        $this->meetingLocation = $meetingLocation;
        return $this;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return ApiAgenda
     */
    public function setDescription($description): ApiAgenda
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return null
     */
    public function getNumberOfAttendees()
    {
        return $this->numberOfAttendees;
    }

    /**
     * @param mixed $numberOfAttendees
     * @return ApiAgenda
     */
    public function setNumberOfAttendees($numberOfAttendees): ApiAgenda
    {
        $this->numberOfAttendees = $numberOfAttendees;
        return $this;
    }

    /**
     * @return null
     */
    public function getNumberOfAbsentees()
    {
        return $this->numberOfAbsentees;
    }

    /**
     * @param mixed $numberOfAbsentees
     * @return ApiAgenda
     */
    public function setNumberOfAbsentees($numberOfAbsentees): ApiAgenda
    {
        $this->numberOfAbsentees = $numberOfAbsentees;
        return $this;
    }

    /**
     * @return null
     */
    public function getNumberOfCancellations()
    {
        return $this->numberOfCancellations;
    }

    /**
     * @param mixed $numberOfCancellations
     * @return ApiAgenda
     */
    public function setNumberOfCancellations($numberOfCancellations): ApiAgenda
    {
        $this->numberOfCancellations = $numberOfCancellations;
        return $this;
    }

    /**
     * @return array
     */
    public function getMeetingAttendees(): array
    {
        return $this->meetingAttendees;
    }

    /**
     * @param $items
     * @return ApiAgenda
     */
    public function setItems($items): ApiAgenda
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
