<?php

namespace CodeBureau\FirstAgendaApi\Messages;

class Agenda
{
    private $agendaUid;
    private $organisationUid;
    private $name;
    private $sourceId;
    private $elasticSearchResults;
    private $meetingBeginFromUtc;
    private $meetingEndUtc;
    private $releasedDate;
    private $minutesOfMeeting;
    private $meetingLocation;

    /**
     * Agenda constructor.
     */
    public function __construct()
    {
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
     * @param mixed $organisationUid
     * @return Agenda
     */
    public function setOrganisationUid($organisationUid): Agenda
    {
        $this->organisationUid = $organisationUid;
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
     * @param mixed $elasticSearchResults
     * @return Agenda
     */
    public function setElasticSearchResults($elasticSearchResults): Agenda
    {
        $this->elasticSearchResults = $elasticSearchResults;
        return $this;
    }

    /**
     * @param mixed $meetingBeginFromUtc
     * @return Agenda
     */
    public function setMeetingBeginFromUtc($meetingBeginFromUtc): Agenda
    {
        $this->meetingBeginFromUtc = $meetingBeginFromUtc;
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
     * @param mixed $agendaUid
     * @return Agenda
     */
    public function setAgendaUid($agendaUid): Agenda
    {
        $this->agendaUid = $agendaUid;
        return $this;
    }

}
