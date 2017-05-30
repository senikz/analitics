<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\YandexMetricaComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\YandexMetricaComponent Test Case
 */
class YandexMetricaComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\YandexMetricaComponent
     */
    public $YandexMetrica;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->YandexMetrica = new YandexMetricaComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->YandexMetrica);

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
