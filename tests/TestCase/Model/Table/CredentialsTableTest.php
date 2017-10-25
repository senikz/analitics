<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CredentialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CredentialsTable Test Case
 */
class CredentialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CredentialsTable
     */
    public $Credentials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.credentials',
        'app.rels',
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
        'app.bid_options',
        'app.keywords',
        'app.adword_groups',
        'app.ad_groups',
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
        $config = TableRegistry::exists('Credentials') ? [] : ['className' => 'App\Model\Table\CredentialsTable'];
        $this->Credentials = TableRegistry::get('Credentials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Credentials);

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
