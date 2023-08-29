<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Node $node
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Node'), ['action' => 'edit', $node->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Node'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Node'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nodes view content">
            <h3><?= h($node->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($node->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Graph') ?></th>
                    <td><?= $node->has('graph') ? $this->Html->link($node->graph->name, ['controller' => 'Graphs', 'action' => 'view', $node->graph->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($node->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Metadata Id') ?></th>
                    <td><?= $node->metadata_id === null ? '' : $this->Number->format($node->metadata_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($node->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($node->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
