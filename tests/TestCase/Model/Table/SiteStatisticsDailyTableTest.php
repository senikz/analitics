<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteStatisticsDailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteStatisticsDailyTable Test Case
 */
class SiteStatisticsDailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteStatisticsDailyTable
     */
    public $SiteStatisticsDaily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_statistics_daily',
        'app.sites',
        'app.projects',
        'app.campaigns',
        'app.credentials',
        'app.campaign_statistics_daily',
        'app.campaign_statistics_hourly',
        'app.ad_groups',
        'app.ads',
        'app.keywords',
        'app.bid_options',
        'app.site_statistics_hourly',
        'app.site_calls',
        'app.site_emails',
        'app.site_orders',
        'app.site_costs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SiteStatisticsDaily') ? [] : ['className' => 'App\Model\Table\SiteStatisticsDailyTable'];
        $this->SiteStatisticsDaily = TableRegistry::get('SiteStatisticsDaily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteStatisticsDaily);

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
