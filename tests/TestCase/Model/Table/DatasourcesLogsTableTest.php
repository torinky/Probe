<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatasourcesLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatasourcesLogsTable Test Case
 */
class DatasourcesLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DatasourcesLogsTable
     */
    public $DatasourcesLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.datasources_logs',
        'app.datasources'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DatasourcesLogs') ? [] : ['className' => DatasourcesLogsTable::class];
        $this->DatasourcesLogs = TableRegistry::getTableLocator()->get('DatasourcesLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DatasourcesLogs);

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
