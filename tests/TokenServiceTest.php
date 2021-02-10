<?php

use CodeBureau\FirstAgendaApi\TokenService;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenServiceTest
 */
class TokenServiceTest extends TestCase
{

    /**
     * @function SetUp
     *
     * Load environmental variables.
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $dotenv = Dotenv::createImmutable(dirname(dirname(__FILE__)));
        $dotenv->load();
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\TokenService::__constructor
     * @test
     */
    public function initiateClassWithParams()
    {
        $service = new TokenService($_ENV["ClientID"], $_ENV["ClientSecret"]);
        self::assertIsObject($service);
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\TokenService::getNewAuthToken
     * @test
     */
    public function getAccessToken()
    {
        $service = new TokenService();
        $token = $service->getNewAuthToken();
        self::assertNotNull($token);
    }
}
