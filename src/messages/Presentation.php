<?php

namespace CodeBureau\FirstAgendaApi\Messages;

/**
 * Class Presentation
 * @package CodeBureau\FirstAgendaApi\Messages
 */
class Presentation
{
    private $type;
    private $title;
    private $content;
    private $documentId;

    public function __construct()
    {
        $this->type = null;
        $this->title = null;
        $this->content = null;
        $this->documentId = null;
    }

    /**
     * @return null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null $type
     * @return Presentation
     */
    public function setType($type): Presentation
    {
        $this->type = $type;
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
     * @return Presentation
     */
    public function setTitle($title): Presentation
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param null $content
     * @return Presentation
     */
    public function setContent($content): Presentation
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return null
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * @param null $documentId
     * @return Presentation
     */
    public function setDocumentId($documentId): Presentation
    {
        $this->documentId = $documentId;
        return $this;
    }
}