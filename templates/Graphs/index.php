<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Graph> $graphs
 */
?>
<div class="graphs index content">
    <?= $this->Html->link(__('New Graph'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Graphs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('metadata_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($graphs as $graph): ?>
                <tr>
                    <td><?= $this->Number->format($graph->id) ?></td>
                    <td><?= h($graph->name) ?></td>
                    <td><?= $graph->metadata_id === null ? '' : $this->Number->format($graph->metadata_id) ?></td>
                    <td><?= h($graph->created) ?></td>
                    <td><?= h($graph->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $graph->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $graph->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $graph->id], ['confirm' => __('Are you sure you want to delete # {0}?', $graph->id)]) ?>
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
