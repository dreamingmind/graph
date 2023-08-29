<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Node $node
 * @var string[]|\Cake\Collection\CollectionInterface $graphs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $node->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $node->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Nodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nodes form content">
            <?= $this->Form->create($node) ?>
            <fieldset>
                <legend><?= __('Edit Node') ?></legend>
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
