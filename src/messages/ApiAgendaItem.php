<?php

namespace CodeBureau\FirstAgendaApi\Messages;

use Tightenco\Collect\Support\Collection;

/**
 * Class ApiAgendaItem
 *
 * This class is a one-to-one mapping of the API response JSON.
 *
 * @package CodeBureau\FirstAgendaApi\Messages
 */
class ApiAgendaItem
{
    private $uid;
    private $agendaUid;
    private $number;
    private $sorting;
    private $isOpen;
    private $caseNumber;
    private $sourceId;
    private $caption;
    private $section;
    private $presentations;
    private $documents;
    private $itemDecision;

    /**
     * AgendaItem constructor.
     * @param $uid
     */
    public function __construct($uid)
    {
        $this->uid = $uid;
        $this->agendaUid = null;
        $this->number = null;
        $this->sorting = null;
        $this->isOpen = null;
        $this->caseNumber = null;
        $this->sourceId = null;
        $this->caption = null;
        $this->section = null;
        $this->presentations = collect([]);
        $this->documents = collect([]);
        $this->itemDecision = collect([]);
    }

    /**
     * @return null
     */
    public function getUid()
    {
        return $this->uid;
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
     * @return ApiAgendaItem
     */
    public function setAgendaUid($agendaUid)
    {
        $this->agendaUid = $agendaUid;
        return $this;
    }

    /**
     * @return null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return ApiAgendaItem
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return null
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param null $sorting
     * @return ApiAgendaItem
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }

    /**
     * @return null
     */
    public function getIsOpen()
    {
        return $this->isOpen;
    }

    /**
     * @param null $isOpen
     * @return ApiAgendaItem
     */
    public function setIsOpen($isOpen)
    {
        $this->isOpen = $isOpen;
        return $this;
    }

    /**
     * @return null
     */
    public function getCaseNumber()
    {
        return $this->caseNumber;
    }

    /**
     * @param mixed $caseNumber
     * @return ApiAgendaItem
     */
    public function setCaseNumber($caseNumber)
    {
        $this->caseNumber = $caseNumber;
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
     * @return ApiAgendaItem
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @return null
     */
    public function getCaption()
    {
        return $this->caption;
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

    /**
     * @return null
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param null $section
     */
    public function setSection($section): ApiAgendaItem
    {
        $this->section = $section;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getPresentations(): Collection
    {
        return $this->presentations;
    }

    /**
     * @param $presentation
     */
    public function addPresentation(Presentation $presentation)
    {
        $this->presentations->add($presentation);
    }

    /**
     * @return Collection
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    /**
     * @param $document
     */
    public function addDocuments(Document $document)
    {
        $this->documents->add($document);
    }

    /**
     * @param $decisionItem
     */
    public function addDecisionItem(Decision $decisionItem)
    {
        $this->itemDecision->add($decisionItem);
    }

    /**
     * @return Collection
     */
    public function getDecisionItems(): Collection
    {
        return $this->itemDecision;
    }
}
