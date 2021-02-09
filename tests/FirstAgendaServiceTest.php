<?php

use CodeBureau\FirstAgendaApi\FirstAgendaService;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * Class FirstAgendaServiceTest
 */
class FirstAgendaServiceTest extends TestCase
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
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByCommittee
     * @test
     */
    public function getAgendasByCommittee()
    {
        $service = new FirstAgendaService();
        $agendas = $service->getAgendasByCommittee($_ENV['TestCommitteeID']);
        self::assertIsArray($agendas);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByOrganization
     * @test
     */
    public function getAgendasByOrganization()
    {
        $service = new FirstAgendaService();
        $agendas = $service->getAgendasByOrganization($_ENV['TestOrganizationID']);
        self::assertIsArray($agendas);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgenda
     * @test
     */
    public function getAgenda()
    {
        $service = new FirstAgendaService();
        $agenda = $service->getAgenda($_ENV['TestAgendaID']);
        self::assertIsObject($agenda);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendaItem
     * @test
     */
    public function getAgendaItem()
    {
        $service = new FirstAgendaService();
        $agendaItem = $service->getAgendaItem($_ENV['TestAgendaItemID']);
        self:self::assertIsObject($agendaItem);
    }

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService::getCommitteesInOrganizations
     * @test
     */
    public function getCommitteesInOrganizations()
    {
        $service = new FirstAgendaService();
        $organizations = $service->getCommitteesInOrganizations($_ENV['TestOrganizationID']);
        self::assertIsArray($organizations, 'Expected array with objects of type CodeBureau\FirstAgendaApi\Messages\Committee');
    }
}
