<?php

namespace CodeBureau\FirstAgendaApi\Messages;

/**
 * Class Document
 * @package CodeBureau\FirstAgendaApi\Messages
 */
class Document
{
    private $uuid;
    private $title;
    private $order;

    /**
     * Document constructor.
     */
    public function __construct()
    {
        $this->uuid = null;
        $this->title = null;
        $this->order = 0;
    }

    /**
     * @return null
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param null $uuid
     * @return Document
     */
    public function setUuid($uuid): Document
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     * @return Document
     */
    public function setTitle($title): Document
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Document
     */
    public function setOrder(int $order): Document
    {
        $this->order = $order;
        return $this;
    }
}