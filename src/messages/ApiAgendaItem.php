<?php

namespace CodeBureau\FirstAgendaApi\Messages;

class ApiAgendaItem
{
    private $uid;
    private $agendaUid;
    private $committeeId;
    private $number;
    private $ordering;
    private $isPublic;
    private $caseNumber;
    private $sourceId;
    private $caption;

    /**
     * AgendaItem constructor.
     */
    public function __construct()
    {
        $this->uid = null;
        $this->agendaUid = null;
        $this->committeeId = null;
        $this->number = null;
        $this->ordering = null;
        $this->isPublic = null;
        $this->caseNumber = null;
        $this->sourceId = null;
        $this->caption = null;
    }

    /**
     * @param mixed $uid
     * @return ApiAgendaItem
     */
    public function setUid($uid): ApiAgendaItem
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @param mixed $agendaUid
     * @return ApiAgendaItem
     */
    public function setAgendaUid($agendaUid): ApiAgendaItem
    {
        $this->agendaUid = $agendaUid;
        return $this;
    }

    /**
     * @param mixed $committeeId
     * @return ApiAgendaItem
     */
    public function setCommitteeId($committeeId): ApiAgendaItem
    {
        $this->committeeId = $committeeId;
        return $this;
    }

    /**
     * @param mixed $number
     * @return ApiAgendaItem
     */
    public function setNumber($number): ApiAgendaItem
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param mixed $ordering
     * @return ApiAgendaItem
     */
    public function setOrdering($ordering): ApiAgendaItem
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * @param mixed $isPublic
     * @return ApiAgendaItem
     */
    public function setIsPublic($isPublic): ApiAgendaItem
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @param mixed $caseNumber
     * @return ApiAgendaItem
     */
    public function setCaseNumber($caseNumber): ApiAgendaItem
    {
        $this->caseNumber = $caseNumber;
        return $this;
    }

    /**
     * @param mixed $sourceId
     * @return ApiAgendaItem
     */
    public function setSourceId($sourceId): ApiAgendaItem
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @param mixed $caption
     * @return ApiAgendaItem
     */
    public function setCaption($caption): ApiAgendaItem
    {
        $this->caption = $caption;
        return $this;
    }

}
