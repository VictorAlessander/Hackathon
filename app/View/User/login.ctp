<!-- app/View/Users/add.ctp -->
<div class="container">
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Fazer login'); ?></legend>
        <?php
        echo $this->Form->input('username', array('label' => 'Email', 'class' => 'form-control') );
        echo $this->Form->input('password', array('label' => 'Senha', 'class' => 'form-control'));
    ?>
    </fieldset>
    <br>
 <button value="Enviar" class="btn btn-success">Salvar</button>

    <?php echo $this->Html->link('Cadastrar-se', array('controller' => 'user', 'action' => 'add'), array('class' => 'btn btn-warning'));?>

<?php echo $this->Form->end();?>

</div>
</div>