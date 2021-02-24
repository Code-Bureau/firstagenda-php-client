<?php

namespace CodeBureau\FirstAgendaApi\Messages;

use Carbon\Carbon;

/**
 * Class Decision
 * @package CodeBureau\FirstAgendaApi\Messages
 */
class Decision
{
    private $created;
    private $updated;
    private $text;

    /**
     * Decision constructor.
     */
    public function __construct()
    {
        $this->created = Carbon::now();
        $this->updated = Carbon::now();
        $this->text = null;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Decision
     */
    public function setCreated(Carbon $created): Decision
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     * @return Decision
     */
    public function setUpdated(Carbon $updated): Decision
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return Decision
     */
    public function setText(string $text): Decision
    {
        $this->text = $text;
        return $this;
    }

}