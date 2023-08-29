<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EdgesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EdgesTable Test Case
 */
class EdgesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EdgesTable
     */
    protected $Edges;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Edges',
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
        $config = $this->getTableLocator()->exists('Edges') ? [] : ['className' => EdgesTable::class];
        $this->Edges = $this->getTableLocator()->get('Edges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Edges);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EdgesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EdgesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
