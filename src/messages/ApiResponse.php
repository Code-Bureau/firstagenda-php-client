<?php

namespace CodeBureau\FirstAgendaApi\Messages;

class ApiResponse
{
    private $status;
    private $message;

    public function __construct($status = null, $message = null)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * @return mixed|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed|null
     */
    public function getMessage()
    {
        return $this->message;
    }
}
