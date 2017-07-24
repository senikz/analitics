<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteOrdersTable Test Case
 */
class SiteOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteOrdersTable
     */
    public $SiteOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_orders',
        'app.sites',
        'app.projects',
        'app.campaigns',
        'app.campaign_statistics_daily',
        'app.campaign_statistics_hourly',
        'app.site_statistics_hourly',
        'app.site_calls',
        'app.site_emails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SiteOrders') ? [] : ['className' => 'App\Model\Table\SiteOrdersTable'];
        $this->SiteOrders = TableRegistry::get('SiteOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteOrders);

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
