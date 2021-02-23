<?php

namespace CodeBureau\FirstAgendaApi\Messages;

use Carbon\Carbon;

/**
 * Class ApiDownloadLink
 * @package CodeBureau\FirstAgendaApi\Messages
 */
class ApiDownloadLink
{
    private $url;
    private $expiration;
    private $errorCode;
    private $errorMessage;
    private $hasError;

    /**
     * ApiDownloadLink constructor.
     */
    public function __construct()
    {
        $this->url = null;
        $this->expiration = Carbon::now();
        $this->errorCode = null;
        $this->errorMessage = null;
        $this->hasError = false;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     * @return ApiDownloadLink
     */
    public function setUrl($url): ApiDownloadLink
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getExpiration(): Carbon
    {
        return $this->expiration;
    }

    /**
     * @param Carbon $expiration
     * @return ApiDownloadLink
     */
    public function setExpiration(Carbon $expiration): ApiDownloadLink
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * @return null
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param null $errorCode
     * @return ApiDownloadLink
     */
    public function setErrorCode($errorCode): ApiDownloadLink
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return null
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param null $errorMessage
     * @return ApiDownloadLink
     */
    public function setErrorMessage($errorMessage): ApiDownloadLink
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return false
     */
    public function getHasError(): bool
    {
        return $this->hasError;
    }

    /**
     * @param false $hasError
     * @return ApiDownloadLink
     */
    public function setHasError(bool $hasError): ApiDownloadLink
    {
        $this->hasError = $hasError;
        return $this;
    }
}