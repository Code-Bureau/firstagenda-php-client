<?php

use CodeBureau\FirstAgendaApi\FirstAgendaService;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * Class FirstAgendaServiceTest
 */
class FirstAgendaServiceTest extends TestCase
{

    private $service;

    /**
     * @function SetUp
     *
     * Load environmental variables.
     *
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (file_exists(dirname(dirname(__FILE__)) . '/.env')) {
            $dotenv = Dotenv::createImmutable(dirname(dirname(__FILE__)));
            $dotenv->load();
        }

        $this->service = new FirstAgendaService();
    }

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByCommittee
     * @test
     */
    public function getAgendasByCommittee()
    {
        $agendas = $this->service->getAgendasByCommittee($_ENV['TestCommitteeID']);
        self::assertIsArray($agendas);
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByCommittee
     * @test
     */
    public function getAgendasByCommitteeWithParams()
    {
        $agendas = $this->service->getAgendasByCommittee($_ENV['TestCommitteeID'],0,20,1,);
        self::assertIsArray($agendas);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendasByOrganization
     * @test
     */
    public function getAgendasByOrganization()
    {
        $agendas = $this->service->getAgendasByOrganization($_ENV['TestOrganizationID']);
        self::assertIsArray($agendas);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgenda
     * @test
     */
    public function getAgenda()
    {
        $agenda = $this->service->getAgenda($_ENV['TestAgendaID']);
        self::assertIsObject($agenda);
    }

    /**
     * @covers CodeBureau\FirstAgendaApi\FirstAgendaService::getAgendaItem
     * @test
     */
    public function getAgendaItem()
    {
        $agendaItem = $this->service->getAgendaItem($_ENV['TestAgendaItemID']);
        self:self::assertIsObject($agendaItem);
    }

    /**
     * @covers  CodeBureau\FirstAgendaApi\FirstAgendaService::getCommitteesInOrganizations
     * @test
     */
    public function getCommitteesInOrganizations()
    {
        $organizations = $this->service->getCommitteesInOrganizations($_ENV['TestOrganizationID']);
        self::assertIsArray($organizations, 'Expected array with objects of type CodeBureau\FirstAgendaApi\Messages\Committee');
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\FirstAgendaService::getAllCommitteesAvailable
     * @test
     */
    public function getCommittees()
    {
        $committees = $this->service->getAllCommitteesAvailable();
        self::assertIsArray($committees, 'Expected array with objects of type CodeBureau\FirstAgendaApi\Messages\Committee');
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\FirstAgendaService::getCorporationDetails
     * @test
     */
    public function getCorporationsDetails()
    {
        $details = $this->service->getCorporationDetails();
        self::assertIsObject($details);
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\FirstAgendaService::getPDFDocumentUrl
     * @test
     */
    public function getPDFDocumentURL()
    {
        $urlObject = $this->service->getPDFDocumentUrl($_ENV['TestDocumentID']);
        self::assertIsObject($urlObject);
    }

    /**
     * @covers \CodeBureau\FirstAgendaApi\FirstAgendaService::getAllOrganizations
     * @test
     */
    public function getOrganizationsList()
    {
        $organizationList = $this->service->getAllOrganizations();
        self::assertIsArray($organizationList);
    }

}
