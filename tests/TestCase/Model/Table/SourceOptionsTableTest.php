<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SourceOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SourceOptionsTable Test Case
 */
class SourceOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SourceOptionsTable
     */
    public $SourceOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.source_options',
        'app.sources'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SourceOptions') ? [] : ['className' => 'App\Model\Table\SourceOptionsTable'];
        $this->SourceOptions = TableRegistry::get('SourceOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SourceOptions);

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
