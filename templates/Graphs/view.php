<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Graph $graph
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Graph'), ['action' => 'edit', $graph->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Graph'), ['action' => 'delete', $graph->id], ['confirm' => __('Are you sure you want to delete # {0}?', $graph->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Graphs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Graph'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="graphs view content">
            <h3><?= h($graph->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($graph->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($graph->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Metadata Id') ?></th>
                    <td><?= $graph->metadata_id === null ? '' : $this->Number->format($graph->metadata_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($graph->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($graph->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
