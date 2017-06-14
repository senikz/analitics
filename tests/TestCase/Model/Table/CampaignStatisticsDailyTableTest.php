<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CampaignStatisticsDailyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CampaignStatisticsDailyTable Test Case
 */
class CampaignStatisticsDailyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CampaignStatisticsDailyTable
     */
    public $CampaignStatisticsDaily;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.campaign_statistics_daily',
        'app.campaigns',
        'app.sites',
        'app.projects',
        'app.site_statistics_hourly',
        'app.rels',
        'app.campaign_statistics_hourly'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CampaignStatisticsDaily') ? [] : ['className' => 'App\Model\Table\CampaignStatisticsDailyTable'];
        $this->CampaignStatisticsDaily = TableRegistry::get('CampaignStatisticsDaily', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CampaignStatisticsDaily);

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
