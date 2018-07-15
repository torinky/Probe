<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TablesLogs;
use App\Model\Table\TablesLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TablesLogs Test Case
 */
class TablesLogsTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TablesLogs
     */
    public $TablesLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tables_logs',
        'app.tables'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TablesLogs') ? [] : ['className' => TablesLogsTable::class];
        $this->TablesLogs = TableRegistry::get('TablesLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TablesLogs);

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
