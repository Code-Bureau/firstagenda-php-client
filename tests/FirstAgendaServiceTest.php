<?php

use CodeBureau\FirstAgendaApi\FirstAgendaService;
use PHPUnit\Framework\TestCase;

class FirstAgendaServiceTest extends TestCase
{

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService
     * @test
     */
    public function getAgendasByCommittee()
    {
        $service = new FirstAgendaService();
        $agendas = $service->getAgendasByCommittee('6e1d3f46-d50b-47f5-bd1f-f12dffdba33b');
        self::assertIsArray($agendas);
    }

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService
     * @test
     */
    public function getOrganizations()
    {
        $service = new FirstAgendaService();
        $organizations = $service->getCommitteesInOrganizations('29f6672e-d63c-438d-bddc-5d3fc45e8270');
        self::assertIsArray($organizations, 'Expected array with objects of type CodeBureau\FirstAgendaApi\Messages\Committee');
    }

}
