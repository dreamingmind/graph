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
            <?= $this->Html->link(__('List Graphs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="graphs form content">
            <?= $this->Form->create($graph) ?>
            <fieldset>
                <legend><?= __('Add Graph') ?></legend>
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
