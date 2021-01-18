<?php

use CodeBureau\FirstAgendaApi\FirstAgendaService;
use PHPUnit\Framework\TestCase;

class FirstAgendaServiceTest extends TestCase
{
    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService
     * @test
     */
    public function getOrganizations()
    {
        $service = new FirstAgendaService();
        $organizations = $service->getOrganizations('29f6672e-d63c-438d-bddc-5d3fc45e8270');
        self::assertIsArray($organizations, 'Expected array with objects of type CodeBureau\FirstAgendaApi\Messages\Committee');
    }
}
