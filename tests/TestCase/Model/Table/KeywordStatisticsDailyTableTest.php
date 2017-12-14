<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KeywordStatisticsDailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KeywordStatisticsDailyTable Test Case
 */
class KeywordStatisticsDailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KeywordStatisticsDailyTable
     */
    public $KeywordStatisticsDaily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.keyword_statistics_daily',
        'app.keywords',
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
        'app.ad_groups',
        'app.ads',
        'app.bid_options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('KeywordStatisticsDaily') ? [] : ['className' => 'App\Model\Table\KeywordStatisticsDailyTable'];
        $this->KeywordStatisticsDaily = TableRegistry::get('KeywordStatisticsDaily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KeywordStatisticsDaily);

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
