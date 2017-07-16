<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteCallsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteCallsTable Test Case
 */
class SiteCallsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteCallsTable
     */
    public $SiteCalls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_calls',
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
        $config = TableRegistry::exists('SiteCalls') ? [] : ['className' => 'App\Model\Table\SiteCallsTable'];
        $this->SiteCalls = TableRegistry::get('SiteCalls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteCalls);

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
