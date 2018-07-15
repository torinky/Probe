<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Tables;
use App\Model\Table\TablesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Tables Test Case
 */
class TablesTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\Tables
     */
    public $Tables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.datasources',
        'app.tables',
        'app.tables_logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tables') ? [] : ['className' => TablesTable::class];
        $this->Tables = TableRegistry::getTableLocator()->get('Tables', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tables);

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
