<?php

namespace CodeBureau\FirstAgendaApi;

use Carbon\Carbon;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class TokenService
 * @package CodeBureau\FirstAgendaApi
 */
class TokenService
{
    private $client;

    private $token;

    /**
     * Service constructor.
     */
    public function __construct ()
    {
        $dotenv = Dotenv::createImmutable(dirname(dirname(__FILE__)));
        $dotenv->load();

        $this->client = new Client([
            'base_uri' => 'https://identity.firstagenda.com/connect/token',
            'timeout'  => 2.0,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json'
            ]
        ]);
    }

    /**
     * @return OAuthToken|null
     */
    public function getNewAuthToken ()
    {
        try {
            $responseRaw = $this->client -> post('/connect/token', [
                        'form_params' => [
                            'grant_type' => 'client_credentials',
                            'scope' => 'prepare_integrationapi',
                            'client_id' => $_ENV["ClientID"],
                            'client_secret' => $_ENV["ClientSecret"]
                        ]
                    ])
                    ->getBody()
                    ->getContents();

            // Map response object
            $response = json_decode($responseRaw);
            $token = $response->access_token;
            $expiryDate = Carbon::now()->addSeconds($response->expires_in);

            // Create new OAuthToken
            $authToken = new OAuthToken($token, $expiryDate);
        } catch (GuzzleException $guzzleException) {
            $authToken = null;
        }
        return $authToken;
    }

    /**
     * @return OAuthToken|null
     */
    public function getAuthToken ()
    {
        if (!$this->token || $this->token->isExpired()) {
            $this->token = $this->getNewAuthToken();
        }

        return $this->token;
    }
}
