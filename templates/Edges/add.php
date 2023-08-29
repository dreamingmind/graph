<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edge $edge
 * @var \Cake\Collection\CollectionInterface|string[] $nodes
 * @var \Cake\Collection\CollectionInterface|string[] $graphs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Edges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="edges form content">
            <?= $this->Form->create($edge) ?>
            <fieldset>
                <legend><?= __('Add Edge') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('metadata_id');
                    echo $this->Form->control('node_a_id');
                    echo $this->Form->control('node_b_id', ['options' => $nodes]);
                    echo $this->Form->control('graph_id', ['options' => $graphs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
