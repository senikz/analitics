<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidOptionsTable Test Case
 */
class BidOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BidOptionsTable
     */
    public $BidOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bid_options',
        'app.rels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BidOptions') ? [] : ['className' => 'App\Model\Table\BidOptionsTable'];
        $this->BidOptions = TableRegistry::get('BidOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BidOptions);

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
