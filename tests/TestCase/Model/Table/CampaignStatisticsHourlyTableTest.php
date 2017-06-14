<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CampaignStatisticsHourlyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CampaignStatisticsHourlyTable Test Case
 */
class CampaignStatisticsHourlyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CampaignStatisticsHourlyTable
     */
    public $CampaignStatisticsHourly;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.campaign_statistics_hourly',
        'app.campaigns',
        'app.sites',
        'app.projects',
        'app.site_statistics_hourly',
        'app.rels',
        'app.campaign_statistics_daily'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CampaignStatisticsHourly') ? [] : ['className' => 'App\Model\Table\CampaignStatisticsHourlyTable'];
        $this->CampaignStatisticsHourly = TableRegistry::get('CampaignStatisticsHourly', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CampaignStatisticsHourly);

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
