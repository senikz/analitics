<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteStatisticsHourlyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteStatisticsHourlyTable Test Case
 */
class SiteStatisticsHourlyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteStatisticsHourlyTable
     */
    public $SiteStatisticsHourly;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.site_statistics_hourly',
        'app.sites',
        'app.projects',
        'app.campaigns',
        'app.rels',
        'app.campaign_statistics_daily',
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
        $config = TableRegistry::exists('SiteStatisticsHourly') ? [] : ['className' => 'App\Model\Table\SiteStatisticsHourlyTable'];
        $this->SiteStatisticsHourly = TableRegistry::get('SiteStatisticsHourly', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteStatisticsHourly);

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
