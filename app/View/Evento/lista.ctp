    <div class="container" style="margin-top: 100px;">
      <div class="descricao-evento">
        <div class="row">
        <?=debug($evento)?>
          <div class="col-lg-7">
            <h1><?=$evento['Evento']['nome'] ?></h1>
            <p>Descrição: <?=$evento['Evento']['descricao'] ?></p>
            <h3>Preço</h3>
            <span class="glyphicon glyphicon-usd">10</span>
            <p>Deseja participar do evento?</p>
            <?php 
              if($authUser){
                echo $this->Html->link('Participar', array('controller' => 'eventos', 'action' => 'participar', $evento['Evento']['id']), array("class" => "btn btn-success"));
              } else {
                echo $this->Html->link('Fazer login', array('controller' => 'user', 'action' => 'login'), array("class" => "btn btn-danger"));
              }
            ?>

          </div>
          <div class="col-lg-3">
            <h2>Participantes</h2>
          </div>
        </div>
      </div>
    </div>