<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NodesTable;
use App\Test\Factory\GraphFactory;
use Cake\Datasource\EntityInterface;
use Cake\TestSuite\TestCase;
use CakephpTestSuiteLight\Fixture\TruncateDirtyTables;

/**
 * App\Model\Table\NodesTable Test Case
 */
class NodesTableTest extends TestCase
{
    use TruncateDirtyTables;

    /**
     * Test subject
     *
     * @var \App\Model\Table\NodesTable
     */
    protected $Nodes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Nodes',
        'app.Graphs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Nodes') ? [] : ['className' => NodesTable::class];
        $this->Nodes = $this->getTableLocator()->get('Nodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Nodes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NodesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NodesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function test_join(): void
    {
        $a = $this->Nodes->get(1);
        $b = $this->Nodes->get(2);
        $actual = $this->Nodes->join($a, $b);
        debug($actual);
        $this->assertInstanceOf(EntityInterface::class, $actual);
    }

    public function test_join_mixingGraphs(): void
    {
        $g = GraphFactory::make(3)->persist();
        $a = $this->Nodes->get(1);
        $b = $this->Nodes->get(4);
        $actual = $this->Nodes->join($a, $b);
        debug($g);
        $this->assertFalse($actual);
    }
}
