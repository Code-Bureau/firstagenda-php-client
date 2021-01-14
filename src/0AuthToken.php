<?php

namespace CodeBureau\FirstAgendaApi;

use Carbon\Carbon;

/**
 * Class OAuthToken
 */
class OAuthToken {

    private $token;
    private $expiresAt;

    /**
     * OAuthToken constructor.
     * @param $token
     * @param Carbon $expiresAt
     */
    public function __construct($token, Carbon $expiresAt)
    {
        $this->token = $token;
        $this->expiresAt = $expiresAt;
    }

    /**
     * @return bool
     */
    public function isExpired ()
    {
        return $this->expiresAt->isPast();
    }
}
