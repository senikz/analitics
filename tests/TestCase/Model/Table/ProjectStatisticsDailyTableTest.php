<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectStatisticsDailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectStatisticsDailyTable Test Case
 */
class ProjectStatisticsDailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectStatisticsDailyTable
     */
    public $ProjectStatisticsDaily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_statistics_daily',
        'app.projects',
        'app.sites',
        'app.campaigns',
        'app.sources',
        'app.source_options',
        'app.users',
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
        $config = TableRegistry::exists('ProjectStatisticsDaily') ? [] : ['className' => ProjectStatisticsDailyTable::class];
        $this->ProjectStatisticsDaily = TableRegistry::get('ProjectStatisticsDaily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectStatisticsDaily);

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
