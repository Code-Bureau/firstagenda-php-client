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
class Agenda
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
     * @param mixed $agendaUid
     * @return Agenda
     */
    public function setAgendaUid($agendaUid): Agenda
    {
        $this->agendaUid = $agendaUid;
        return $this;
    }

    /**
     * @param mixed $organisationUid
     * @return Agenda
     */
    public function setOrganisationUid($organisationUid): Agenda
    {
        $this->organisationUid = $organisationUid;
        return $this;
    }

    /**
     * @param mixed $committeeName
     * @return Agenda
     */
    public function setCommitteeName($committeeName): Agenda
    {
        $this->committeeName = $committeeName;
        return $this;
    }

    /**
     * @param mixed $committeeUid
     * @return Agenda
     */
    public function setCommitteeUid($committeeUid): Agenda
    {
        $this->committeeUid = $committeeUid;
        return $this;
    }

    /**
     * @param mixed $name
     * @return Agenda
     */
    public function setName($name): Agenda
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $sourceId
     * @return Agenda
     */
    public function setSourceId($sourceId): Agenda
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @param mixed $highLight
     * @return Agenda
     */
    public function setHighLight($highLight): Agenda
    {
        $this->highLight = $highLight;
        return $this;
    }

    /**
     * @param mixed $elasticSearchResults
     * @return Agenda
     */
    public function setElasticSearchResults($elasticSearchResults): Agenda
    {
        $this->elasticSearchResults = $elasticSearchResults;
        return $this;
    }

    /**
     * @param mixed $meetingBeginUtc
     * @return Agenda
     */
    public function setMeetingBeginUtc($meetingBeginUtc): Agenda
    {
        $this->meetingBeginUtc = $meetingBeginUtc;
        return $this;
    }

    /**
     * @param mixed $MeetingEndUtc
     * @return Agenda
     */
    public function setMeetingEndUtc($MeetingEndUtc): Agenda
    {
        $this->meetingEndUtc = $MeetingEndUtc;
        return $this;
    }

    /**
     * @param mixed $releasedDate
     * @return Agenda
     */
    public function setReleasedDate($releasedDate): Agenda
    {
        $this->releasedDate = $releasedDate;
        return $this;
    }

    /**
     * @param null $releasedBy
     * @return Agenda
     */
    public function setReleasedBy($releasedBy): Agenda
    {
        $this->releasedBy = $releasedBy;
        return $this;
    }

    /**
     * @param null $status
     * @return Agenda
     */
    public function setStatus($status): Agenda
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param null $isPublic
     * @return Agenda
     */
    public function setIsPublic($isPublic): Agenda
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @param mixed $minutesOfMeeting
     * @return Agenda
     */
    public function setMinutesOfMeeting($minutesOfMeeting): Agenda
    {
        $this->minutesOfMeeting = $minutesOfMeeting;
        return $this;
    }

    /**
     * @param mixed $meetingLocation
     * @return Agenda
     */
    public function setMeetingLocation($meetingLocation): Agenda
    {
        $this->meetingLocation = $meetingLocation;
        return $this;
    }

    /**
     * @param mixed $description
     * @return Agenda
     */
    public function setDescription($description): Agenda
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $numberOfAttendees
     * @return Agenda
     */
    public function setNumberOfAttendees($numberOfAttendees): Agenda
    {
        $this->numberOfAttendees = $numberOfAttendees;
        return $this;
    }

    /**
     * @param mixed $numberOfAbsentees
     * @return Agenda
     */
    public function setNumberOfAbsentees($numberOfAbsentees): Agenda
    {
        $this->numberOfAbsentees = $numberOfAbsentees;
        return $this;
    }

    /**
     * @param mixed $numberOfCancellations
     * @return Agenda
     */
    public function setNumberOfCancellations($numberOfCancellations): Agenda
    {
        $this->numberOfCancellations = $numberOfCancellations;
        return $this;
    }

}
