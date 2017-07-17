<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteEmailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteEmailsTable Test Case
 */
class SiteEmailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteEmailsTable
     */
    public $SiteEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_emails',
        'app.sites',
        'app.projects',
        'app.campaigns',
        'app.campaign_statistics_daily',
        'app.campaign_statistics_hourly',
        'app.site_statistics_hourly'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SiteEmails') ? [] : ['className' => 'App\Model\Table\SiteEmailsTable'];
        $this->SiteEmails = TableRegistry::get('SiteEmails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteEmails);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
