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
    <div class="column column-80">
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
            <div class="related">
                <h4><?= __('Related Edges') ?></h4>
                <?php if (!empty($graph->edges)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Metadata Id') ?></th>
                            <th><?= __('Node A Id') ?></th>
                            <th><?= __('Node B Id') ?></th>
                            <th><?= __('Graph Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($graph->edges as $edges) : ?>
                        <tr>
                            <td><?= h($edges->id) ?></td>
                            <td><?= h($edges->name) ?></td>
                            <td><?= h($edges->metadata_id) ?></td>
                            <td><?= h($edges->node_a_id) ?></td>
                            <td><?= h($edges->node_b_id) ?></td>
                            <td><?= h($edges->graph_id) ?></td>
                            <td><?= h($edges->created) ?></td>
                            <td><?= h($edges->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Edges', 'action' => 'view', $edges->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Edges', 'action' => 'edit', $edges->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Edges', 'action' => 'delete', $edges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $edges->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Nodes') ?></h4>
                <?php if (!empty($graph->nodes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Metadata Id') ?></th>
                            <th><?= __('Graph Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($graph->nodes as $nodes) : ?>
                        <tr>
                            <td><?= h($nodes->id) ?></td>
                            <td><?= h($nodes->name) ?></td>
                            <td><?= h($nodes->metadata_id) ?></td>
                            <td><?= h($nodes->graph_id) ?></td>
                            <td><?= h($nodes->created) ?></td>
                            <td><?= h($nodes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Nodes', 'action' => 'view', $nodes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Nodes', 'action' => 'edit', $nodes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nodes', 'action' => 'delete', $nodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nodes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
