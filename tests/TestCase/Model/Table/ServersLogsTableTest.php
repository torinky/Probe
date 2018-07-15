<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServersLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServersLogsTable Test Case
 */
class ServersLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServersLogsTable
     */
    public $ServersLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servers_logs',
        'app.servers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ServersLogs') ? [] : ['className' => ServersLogsTable::class];
        $this->ServersLogs = TableRegistry::get('ServersLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ServersLogs);

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
