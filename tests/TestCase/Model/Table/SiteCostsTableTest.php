<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteCostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteCostsTable Test Case
 */
class SiteCostsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteCostsTable
     */
    public $SiteCosts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_costs',
        'app.sites',
        'app.projects',
        'app.campaigns',
        'app.campaign_statistics_daily',
        'app.campaign_statistics_hourly',
        'app.site_statistics_hourly',
        'app.site_calls',
        'app.site_emails',
        'app.site_orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SiteCosts') ? [] : ['className' => 'App\Model\Table\SiteCostsTable'];
        $this->SiteCosts = TableRegistry::get('SiteCosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteCosts);

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
