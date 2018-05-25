<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SourceStatisticsDailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SourceStatisticsDailyTable Test Case
 */
class SourceStatisticsDailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SourceStatisticsDailyTable
     */
    public $SourceStatisticsDaily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.source_statistics_daily',
        'app.sources',
        'app.source_options',
        'app.campaigns',
        'app.sites',
        'app.projects',
        'app.site_statistics_hourly',
        'app.site_calls',
        'app.site_emails',
        'app.site_orders',
        'app.site_costs',
        'app.campaign_statistics_daily',
        'app.campaign_statistics_hourly',
        'app.ad_groups',
        'app.ads',
        'app.keywords',
        'app.bid_options',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SourceStatisticsDaily') ? [] : ['className' => SourceStatisticsDailyTable::class];
        $this->SourceStatisticsDaily = TableRegistry::get('SourceStatisticsDaily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SourceStatisticsDaily);

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
