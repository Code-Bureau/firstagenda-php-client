<?php

use CodeBureau\FirstAgendaApi\FirstAgendaService;
use PHPUnit\Framework\TestCase;

/**
 * Class FirstAgendaServiceTest
 */
class FirstAgendaServiceTest extends TestCase
{

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByCommittee
     * @test
     */
    public function getAgendasByCommittee()
    {
        $service = new FirstAgendaService();
        $agendas = $service->getAgendasByCommittee('6e1d3f46-d50b-47f5-bd1f-f12dffdba33b');
        self::assertIsArray($agendas);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByOrganization
     * @test
     */
    public function getAgendasByOrganization()
    {
        $service = new FirstAgendaService();
        $agendas = $service->getAgendasByOrganization('29f6672e-d63c-438d-bddc-5d3fc45e8270');
        self::assertIsArray($agendas);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgenda
     * @test
     */
    public function getAgenda()
    {
        $service = new FirstAgendaService();
        $agenda = $service->getAgenda('dd46f4f3-e78a-4db8-9f7b-7350f3d65eb6');
        self::assertIsObject($agenda);
    }

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService::getCommitteesInOrganizations
     * @test
     */
    public function getCommitteesInOrganizations()
    {
        $service = new FirstAgendaService();
        $organizations = $service->getCommitteesInOrganizations('29f6672e-d63c-438d-bddc-5d3fc45e8270');
        self::assertIsArray($organizations, 'Expected array with objects of type CodeBureau\FirstAgendaApi\Messages\Committee');
    }


}
