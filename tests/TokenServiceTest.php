<?php

use CodeBureau\FirstAgendaApi\TokenService;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenServiceTest
 */
class TokenServiceTest extends TestCase
{
    /**
     * @covers \CodeBureau\FirstAgendaApi\Service
     * @test
     */
    public function getAccessToken()
    {
        $service = new TokenService();
        $token = $service->getNewAuthToken();
        self::assertNotNull($token);
    }
}
