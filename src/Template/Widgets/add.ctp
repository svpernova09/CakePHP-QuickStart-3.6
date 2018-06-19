<?php
$this->layout = 'default';
?>
<div class="col-md-6">
    <?php echo $this->Form->create(); ?>
    <?php echo $this->Form->control('name', ['label' => 'Name:', 'class' => 'form-control']); ?>
    <?php echo $this->Form->control('price', ['label' => 'Price:', 'class' => 'form-control']); ?>
    <?php echo $this->Form->control('description', ['type' => 'textarea','label' => 'Description:', 'class' => 'form-control']); ?>
    <?php echo $this->Form->submit('Add Widget', ['class' => 'form-control btn btn-primary']); ?>
    <?= $this->Form->end(); ?>
</div>