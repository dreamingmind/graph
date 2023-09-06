<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GraphsTable;
use App\Test\Factory\GraphFactory;
use Cake\TestSuite\TestCase;
use CakephpTestSuiteLight\Fixture\TruncateDirtyTables;

/**
 * App\Model\Table\GraphsTable Test Case
 */
class GraphsTableTest extends TestCase
{
    use TruncateDirtyTables;

    /**
     * Test subject
     *
     * @var \App\Model\Table\GraphsTable
     */
    protected $Graphs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
//        'app.Graphs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Graphs') ? [] : ['className' => GraphsTable::class];
        $this->Graphs = $this->getTableLocator()->get('Graphs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Graphs);

        parent::tearDown();
    }

    public function testFind()
    {
        $g = GraphFactory::make()->persist();
        debug($g);
//        $vals = $this->Graphs
//            ->find()
//            ->all();
//        debug($vals);
    }

}
