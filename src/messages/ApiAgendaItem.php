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
        $this->itemDecision = null;
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
    public function setAgendaUid($agendaUid): ApiAgendaItem
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
    public function setNumber($number): ApiAgendaItem
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
    public function setSorting($sorting): ApiAgendaItem
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
    public function setIsOpen($isOpen): ApiAgendaItem
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
    public function setCaseNumber($caseNumber): ApiAgendaItem
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
    public function setSourceId($sourceId): ApiAgendaItem
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
     * @param Presentation $presentation
     * @return ApiAgendaItem
     */
    public function addPresentation(Presentation $presentation): ApiAgendaItem
    {
        $this->presentations->add($presentation);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    /**
     * @param Document $document
     * @return ApiAgendaItem
     */
    public function addDocuments(Document $document): ApiAgendaItem
    {
        $this->documents->add($document);
        return $this;
    }

    /**
     * @function setDecisionItem
     *
     * This method sets the decision Item and returns the class instance.
     *
     * @param Decision $decisionItem
     * @return ApiAgendaItem
     */
    public function setDecisionItem(Decision $decisionItem): ApiAgendaItem
    {
        $this->itemDecision = $decisionItem;
        return $this;
    }

    /**
     * @function getDecisionItem
     *
     * This method returns the decision item.
     *
     * @return Decision || null
     */
    public function getDecisionItem(): ?Decision
    {
        return $this->itemDecision;
    }

    /**
     * @function toArray
     *
     * This method returns an array with all the properties of this class.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array(
            'uid' => $this->getUid(),
            'agendaUid' => $this->getAgendaUid(),
            'number' => $this->getNumber(),
            'sorting' => $this->getSorting(),
            'isOpen' => $this->getIsOpen(),
            'caseNumber' => $this->getCaseNumber(),
            'sourceId' => $this->getSourceId(),
            'caption' => $this->getCaption(),
            'section' => $this->getSection(),
            'presentations' => $this->getPresentations()->map(function (Presentation $presentation) {
                return array(
                    'title' => $presentation->getTitle(),
                    'docuemntId' => $presentation->getDocumentId()
                );
            })->toArray(),
            'documents' => $this->getDocuments()->map(function (Document $document) {
                return array(
                    'title' => $document->getTitle(),
                    'documentId' => $document->getUuid()
                );
            })->toArray(),
            'itemDecision' => $this->getDecisionItem() ? $this->getDecisionItem()->getText() : null
        );
    }
}
