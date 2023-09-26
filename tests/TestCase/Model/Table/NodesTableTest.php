<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Constants\EntityError;
use App\Model\Table\NodesTable;
use App\Test\Factory\GraphFactory;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
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


    public function test_join(): void
    {
        $a = $this->Nodes->get(1);
        $b = $this->Nodes->get(2);

        $actual = $this->Nodes->join($a, $b);

        $this->assertInstanceOf(EntityInterface::class, $actual);
    }

    public function test_join_nodeAcrossGraphs(): void
    {
        $graph = $this->fetchTable('Graphs')
            ->find()
            ->contain('Nodes')
            ->limit(2)
            ->toArray();
        $a = $graph[0]->nodes[0];
        $b = $graph[1]->nodes[0];

        $actual = $this->Nodes->join($a, $b);
        $errors = $actual->getErrors();

        $this->assertArrayHasKey('node_b_id', $errors);
        $this->assertArrayHasKey(EntityError::NOT_SAME_GRAPH, $errors['node_b_id']);
    }
    }
}
