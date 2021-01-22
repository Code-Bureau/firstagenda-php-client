<?php

namespace CodeBureau\FirstAgendaApi\messages;

class AgendaItem
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
     * @return AgendaItem
     */
    public function setUid($uid): AgendaItem
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @param mixed $agendaUid
     * @return AgendaItem
     */
    public function setAgendaUid($agendaUid): AgendaItem
    {
        $this->agendaUid = $agendaUid;
        return $this;
    }

    /**
     * @param mixed $committeeId
     * @return AgendaItem
     */
    public function setCommitteeId($committeeId): AgendaItem
    {
        $this->committeeId = $committeeId;
        return $this;
    }

    /**
     * @param mixed $number
     * @return AgendaItem
     */
    public function setNumber($number): AgendaItem
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param mixed $ordering
     * @return AgendaItem
     */
    public function setOrdering($ordering): AgendaItem
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * @param mixed $isPublic
     * @return AgendaItem
     */
    public function setIsPublic($isPublic): AgendaItem
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @param mixed $caseNumber
     * @return AgendaItem
     */
    public function setCaseNumber($caseNumber): AgendaItem
    {
        $this->caseNumber = $caseNumber;
        return $this;
    }

    /**
     * @param mixed $sourceId
     * @return AgendaItem
     */
    public function setSourceId($sourceId): AgendaItem
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @param mixed $caption
     * @return AgendaItem
     */
    public function setCaption($caption): AgendaItem
    {
        $this->caption = $caption;
        return $this;
    }

}
