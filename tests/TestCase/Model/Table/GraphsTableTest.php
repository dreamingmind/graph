<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GraphsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GraphsTable Test Case
 */
class GraphsTableTest extends TestCase
{
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
}
