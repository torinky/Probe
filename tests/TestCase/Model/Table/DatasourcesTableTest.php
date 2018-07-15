<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatasourcesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatasourcesTable Test Case
 */
class DatasourcesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DatasourcesTable
     */
    public $Datasources;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.datasources',
        'app.datasources_logs',
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
        $config = TableRegistry::getTableLocator()->exists('Datasources') ? [] : ['className' => DatasourcesTable::class];
        $this->Datasources = TableRegistry::getTableLocator()->get('Datasources', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Datasources);

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
}
