<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\YandexDirectComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\YandexDirectComponent Test Case
 */
class YandexDirectComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\YandexDirectComponent
     */
    public $YandexDirect;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->YandexDirect = new YandexDirectComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->YandexDirect);

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
