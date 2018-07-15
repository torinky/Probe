<?php

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\AdminbsbHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\AdminbsbHelper Test Case
 */
class AdminbsbHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\AdminbsbHelper
     */
    public $Adminbsb;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Adminbsb = new AdminbsbHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adminbsb);

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
