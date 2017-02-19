<div class="container">

<div class="row row-cat">

          <?php
           foreach ($psc as $p) { 
            foreach ($evt as $e) {
              if($e['Evento']['id'] == $p['Presenca']['evento_id']) {
            ?>
          <div class="col-lg-4">
            <h3><?=$e['Evento']['nome']?></h3>
            <p><?=$e['Evento']['descricao']?></p>
            <p><?php echo $this->Html->link('Ver detalhes do evento »', array('controller' => 'evento', 'action' => 'lista', $e['Evento']['id']), array('class' => "btn btn-primary" )); ?></p>
          </div>
            <?php 
                }
              }
            } 
            ?>
        </div>
        </div>