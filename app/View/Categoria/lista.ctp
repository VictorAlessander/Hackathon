<div class="container">
<h1><?=$categorias['Categoria']['nome']?>
  <?php 
  if($authUser){
      echo $this->Html->link('Criar evento', array('controller' => 'evento', 'action' => 'add', $categorias['Categoria']['id']), array('class' => "btn btn-primary" ));
  }
  ?>
</h1>

<div class="row row-cat">

          <?php foreach ($eventos as $evento) { ?>
          <div class="col-lg-4">
            <h3><?=$evento['Evento']['nome']?></h3>
            <p><?=$evento['Evento']['descricao']?></p>
            <p><?php echo $this->Html->link('Ver detalhes do evento »', array('controller' => 'evento', 'action' => 'lista', $evento['Evento']['id']), array('class' => "btn btn-primary" )); ?></p>
          </div>
          <?php } ?>
        </div>
        </div>