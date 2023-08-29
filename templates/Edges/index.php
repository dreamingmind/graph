<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Edge> $edges
 */
?>
<div class="edges index content">
    <?= $this->Html->link(__('New Edge'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Edges') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('metadata_id') ?></th>
                    <th><?= $this->Paginator->sort('node_a_id') ?></th>
                    <th><?= $this->Paginator->sort('node_b_id') ?></th>
                    <th><?= $this->Paginator->sort('graph_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($edges as $edge): ?>
                <tr>
                    <td><?= $this->Number->format($edge->id) ?></td>
                    <td><?= h($edge->name) ?></td>
                    <td><?= $edge->metadata_id === null ? '' : $this->Number->format($edge->metadata_id) ?></td>
                    <td><?= $this->Number->format($edge->node_a_id) ?></td>
                    <td><?= $edge->has('node') ? $this->Html->link($edge->node->name, ['controller' => 'Nodes', 'action' => 'view', $edge->node->id]) : '' ?></td>
                    <td><?= $edge->has('graph') ? $this->Html->link($edge->graph->name, ['controller' => 'Graphs', 'action' => 'view', $edge->graph->id]) : '' ?></td>
                    <td><?= h($edge->created) ?></td>
                    <td><?= h($edge->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $edge->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $edge->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $edge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $edge->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
