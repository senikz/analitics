<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountOptionsTable Test Case
 */
class AccountOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountOptionsTable
     */
    public $AccountOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.account_options',
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
        $config = TableRegistry::exists('AccountOptions') ? [] : ['className' => AccountOptionsTable::class];
        $this->AccountOptions = TableRegistry::get('AccountOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountOptions);

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
