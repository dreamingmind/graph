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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $graph->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $graph->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Graphs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="graphs form content">
            <?= $this->Form->create($graph) ?>
            <fieldset>
                <legend><?= __('Edit Graph') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('metadata_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
