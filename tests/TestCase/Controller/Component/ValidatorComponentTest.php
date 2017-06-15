<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ValidatorComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ValidatorComponent Test Case
 */
class ValidatorComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\ValidatorComponent
     */
    public $Validator;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Validator = new ValidatorComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Validator);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
