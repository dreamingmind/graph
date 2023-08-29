<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Node $node
 * @var \Cake\Collection\CollectionInterface|string[] $graphs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="nodes form content">
            <?= $this->Form->create($node) ?>
            <fieldset>
                <legend><?= __('Add Node') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('metadata_id');
                    echo $this->Form->control('graph_id', ['options' => $graphs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
