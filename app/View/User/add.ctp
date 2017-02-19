<!-- app/View/Users/add.ctp -->
<div class="container">
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Criar usuario'); ?></legend>
        <?php
        echo $this->Form->input('nome', array('label' => 'Nome'));
        echo $this->Form->input('cpf', array('label' => 'CPF'));
        echo $this->Form->input('username', array('label' => 'Email'));
        echo $this->Form->input('password', array('label' => 'Senha'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
</div>