<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edge $edge
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Edge'), ['action' => 'edit', $edge->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Edge'), ['action' => 'delete', $edge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $edge->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Edges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Edge'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="edges view content">
            <h3><?= h($edge->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($edge->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Node') ?></th>
                    <td><?= $edge->has('node') ? $this->Html->link($edge->node->name, ['controller' => 'Nodes', 'action' => 'view', $edge->node->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Graph') ?></th>
                    <td><?= $edge->has('graph') ? $this->Html->link($edge->graph->name, ['controller' => 'Graphs', 'action' => 'view', $edge->graph->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($edge->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Metadata Id') ?></th>
                    <td><?= $edge->metadata_id === null ? '' : $this->Number->format($edge->metadata_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Node A Id') ?></th>
                    <td><?= $this->Number->format($edge->node_a_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($edge->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($edge->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
