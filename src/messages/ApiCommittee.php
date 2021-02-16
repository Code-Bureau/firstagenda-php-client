<?php

namespace CodeBureau\FirstAgendaApi\Messages;

class ApiCommittee
{
    private $name;
    private $sourceId;
    private $isPublic;
    private $isHistorical;
    private $showPublicCaptionForClosedItems;
    private $showPublicDecisionForClosedItems;
    private $committeeUid;
    private $organisationUid;

    /**
     * ApiCommittee constructor.
     */
    public function __construct()
    {
        $this->name = null;
        $this->sourceId = null;
        $this->isPublic = false;
        $this->isHistorical = false;
        $this->showPublicCaptionForClosedItems = false;
        $this->showPublicDecisionForClosedItems = false;
        $this->committeeUid = null;
        $this->organisationUid = null;
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
     * @return ApiCommittee
     */
    public function setName($name)
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
     * @return ApiCommittee
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @return false
     */
    public function getIsPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     * @return ApiCommittee
     */
    public function setIsPublic(bool $isPublic)
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @return false
     */
    public function getIsHistorical(): bool
    {
        return $this->isHistorical;
    }

    /**
     * @param bool $isHistorical
     * @return ApiCommittee
     */
    public function setIsHistorical(bool $isHistorical)
    {
        $this->isHistorical = $isHistorical;
        return $this;
    }

    /**
     * @return false
     */
    public function getShowPublicCaptionForClosedItems(): bool
    {
        return $this->showPublicCaptionForClosedItems;
    }

    /**
     * @param bool $showPublicCaptionForClosedItems
     * @return ApiCommittee
     */
    public function setShowPublicCaptionForClosedItems(bool $showPublicCaptionForClosedItems)
    {
        $this->showPublicCaptionForClosedItems = $showPublicCaptionForClosedItems;
        return $this;
    }

    /**
     * @return false
     */
    public function getShowPublicDecisionForClosedItems(): bool
    {
        return $this->showPublicDecisionForClosedItems;
    }

    /**
     * @param bool $showPublicDecisionForClosedItems
     * @return ApiCommittee
     */
    public function setShowPublicDecisionForClosedItems(bool $showPublicDecisionForClosedItems)
    {
        $this->showPublicDecisionForClosedItems = $showPublicDecisionForClosedItems;
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
     * @return ApiCommittee
     */
    public function setCommitteeUid($committeeUid)
    {
        $this->committeeUid = $committeeUid;
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
     * @return ApiCommittee
     */
    public function setOrganisationUid($organisationUid)
    {
        $this->organisationUid = $organisationUid;
        return $this;
    }
}
