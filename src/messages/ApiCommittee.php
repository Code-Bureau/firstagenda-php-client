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

    public function __construct()
    {

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
     * @param mixed $sourceId
     * @return ApiCommittee
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
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
     * @param bool $isHistorical
     * @return ApiCommittee
     */
    public function setIsHistorical(bool $isHistorical)
    {
        $this->isHistorical = $isHistorical;
        return $this;
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
     * @param bool $showPublicDecisionForClosedItems
     * @return ApiCommittee
     */
    public function setShowPublicDecisionForClosedItems(bool $showPublicDecisionForClosedItems)
    {
        $this->showPublicDecisionForClosedItems = $showPublicDecisionForClosedItems;
        return $this;
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
     * @param mixed $organisationUid
     * @return ApiCommittee
     */
    public function setOrganisationUid($organisationUid)
    {
        $this->organisationUid = $organisationUid;
        return $this;
    }
}
