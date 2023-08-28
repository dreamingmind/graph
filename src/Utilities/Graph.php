<?php

namespace App\Utilities;

class Graph
{

    private string $_graph_id;
    private bool $_is_directed;
    /**
     * @var Node[]
     */
    private array $_nodes = [];
    /**
     * @var Edge[]
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
     * @param ...$args
     */
    public function __construct(...$args)
    {
        $this->_graph_id = $args['graphId'] ?? uniqid('graph_');

        $this->_adjacency_list = $args['adjacencyList'] ?? [];

        if ($args['nodes'] && is_array($args['nodes'])) {
            $this->_nodes = $args['nodes'];
        }

        if ($args['edges'] && is_array($args['edges'])) {
            $this->_edges = $args['edges'];
        }
    }
}
