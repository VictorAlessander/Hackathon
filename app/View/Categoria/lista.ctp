<div class="container">
<h1><?=$categorias['Categoria']['nome']?></h1>

<div class="row" style="margin: 0 auto; margin-top: 100px; margin-left: -15px; margin-right: -15px;">
          <?php foreach ($eventos as $evento) { ?>
          <div class="col-lg-4">
            <h3><?=$evento['Evento']['nome']?></h3>
            <p><?=$evento['Evento']['descricao']?></p>
            <p><?php echo $this->Html->link('Ver detalhes do evento »', array('controller' => 'evento', 'action' => 'lista', $evento['Evento']['id']), array('class' => "btn btn-primary" )); ?></p>
          </div>
          <?php } ?>
        </div>
        </div>