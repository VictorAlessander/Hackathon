<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Fazer login'); ?></legend>
        <?php
        echo $this->Form->input('email', array('label' => 'Email'));
        echo $this->Form->input('senha', array('label' => 'Senha'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>