<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdGroupStatisticsDailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdGroupStatisticsDailyTable Test Case
 */
class AdGroupStatisticsDailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdGroupStatisticsDailyTable
     */
    public $AdGroupStatisticsDaily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ad_group_statistics_daily',
        'app.ad_groups',
        'app.campaigns',
        'app.sites',
        'app.projects',
        'app.site_statistics_hourly',
        'app.site_calls',
        'app.site_emails',
        'app.site_orders',
        'app.site_costs',
        'app.credentials',
        'app.campaign_statistics_daily',
        'app.campaign_statistics_hourly',
        'app.keywords',
        'app.bid_options',
        'app.ads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdGroupStatisticsDaily') ? [] : ['className' => 'App\Model\Table\AdGroupStatisticsDailyTable'];
        $this->AdGroupStatisticsDaily = TableRegistry::get('AdGroupStatisticsDaily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdGroupStatisticsDaily);

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
