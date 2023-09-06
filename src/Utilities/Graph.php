<?php
declare(strict_types=1);

namespace App\Utilities;

use Cake\ORM\Locator\LocatorAwareTrait;

class Graph
{
    use LocatorAwareTrait;

    private string $_graph_id;
    private bool $_is_directed;
    /**
     * @var \App\Utilities\Node[]
     */
    private array $_nodes = [];
    /**
     * @var \App\Utilities\Edge[]
     */
    private array $_edges = [];
    private ?array $_adjacency_list = null;
    private ?array $_adjacency_matrix = null;

    /**
     * allowed keys
     *      'graphId' string
     *      'adjacencyList' array
     *      'nodes' NodesInterface[]
     *      'edge' EdgeInterface[]
     *
     * @param ...$args
     */
    public function __construct(...$args)
    {
        $this->graph = $args['graph'];
        $this->_graph_id = $args['graphId'];
    }

    public function displace(Node $old_node, Node $new_node): void
    {
    }
}
