<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AggregatedetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AggregatedetailsTable Test Case
 */
class AggregatedetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AggregatedetailsTable
     */
    public $Aggregatedetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Aggregatedetails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Aggregatedetails') ? [] : ['className' => AggregatedetailsTable::class];
        $this->Aggregatedetails = TableRegistry::getTableLocator()->get('Aggregatedetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aggregatedetails);

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
