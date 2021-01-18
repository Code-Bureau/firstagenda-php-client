<?php

namespace CodeBureau\FirstAgendaApi\Messages;

class Committee
{
    private $name;
    private $sourceId;
    private $isPublic;
    private $isHistorical;
    private $showPublicCaptionForClosedItems;
    private $showPublicDecisionForClosedItems;
    private $committeeUid;
    private $organisationUid;

    public function __construct()
    {

    }

    /**
     * @param mixed $name
     * @return Committee
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $sourceId
     * @return Committee
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * @param bool $isPublic
     * @return Committee
     */
    public function setIsPublic(bool $isPublic)
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @param bool $isHistorical
     * @return Committee
     */
    public function setIsHistorical(bool $isHistorical)
    {
        $this->isHistorical = $isHistorical;
        return $this;
    }

    /**
     * @param bool $showPublicCaptionForClosedItems
     * @return Committee
     */
    public function setShowPublicCaptionForClosedItems(bool $showPublicCaptionForClosedItems)
    {
        $this->showPublicCaptionForClosedItems = $showPublicCaptionForClosedItems;
        return $this;
    }

    /**
     * @param bool $showPublicDecisionForClosedItems
     * @return Committee
     */
    public function setShowPublicDecisionForClosedItems(bool $showPublicDecisionForClosedItems)
    {
        $this->showPublicDecisionForClosedItems = $showPublicDecisionForClosedItems;
        return $this;
    }

    /**
     * @param mixed $committeeUid
     * @return Committee
     */
    public function setCommitteeUid($committeeUid)
    {
        $this->committeeUid = $committeeUid;
        return $this;
    }

    /**
     * @param mixed $organisationUid
     * @return Committee
     */
    public function setOrganisationUid($organisationUid)
    {
        $this->organisationUid = $organisationUid;
        return $this;
    }
}
