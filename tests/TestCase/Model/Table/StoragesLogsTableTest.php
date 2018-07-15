<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoragesLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoragesLogsTable Test Case
 */
class StoragesLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoragesLogsTable
     */
    public $StoragesLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.storages_logs',
        'app.storages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StoragesLogs') ? [] : ['className' => StoragesLogsTable::class];
        $this->StoragesLogs = TableRegistry::get('StoragesLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoragesLogs);

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
