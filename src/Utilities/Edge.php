<?php

namespace App\Utilities;

class Edge implements EdgeInterface
{

    const ONE = false;
    const TWO = true;

    private NodeInterface $_node1;
    private NodeInterface $_node2;

    public function weight()
    {
        return $this->weight();
    }

    public function id()
    {
        return $this->id();
    }

    public function node(bool $target)
    {
        return $target ? $this->_node1->id() : $this->_node2->id();
    }

    public function keys()
    {
        return [
            $this->node(self::ONE) . '_' . $this->node(self::TWO),
            $this->node(self::TWO) . '_' . $this->node(self::ONE),
        ];
    }
}
