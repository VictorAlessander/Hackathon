    <div class="container" style="margin-top: 100px;">
      <div class="descricao-evento">
        <div class="row">
          <div class="col-lg-7">
            <?php
             if($evento['User']['id'] == $authUser['id']) {
                echo $this->Html->link('Cancelar curso', array('controller' => 'evento', 'action' => 'cancela', $evento['Evento']['id']), array("class" => "btn btn-danger"));
                if($evento['Evento']['data'] == date("d/m/Y") || $dt->getTimestamp() <= $dt1->getTimestamp()) {
                  echo $this->Html->link('Finalizar curso', array('controller' => 'evento', 'action' => 'finalizar', $evento['Evento']['id']), array("class" => "btn btn-success"));
                }
             }
             ?>

            <h1><?=$evento['Evento']['nome'] ?></h1>
            <p>Descrição: <?=$evento['Evento']['descricao'] ?></p>
            <h3>Preço</h3>
            <span class="glyphicon glyphicon-usd">10</span>
            <br>
            <br>
            <p> Local: <?=$evento['Evento']['local']?></p>
            <p>Deseja participar do evento?</p>
            <?php 
              if($authUser){
                echo $this->Html->link('Participar', array('controller' => 'evento', 'action' => 'participar', $evento['Evento']['id']), array("class" => "btn btn-success"));
              } else {
                echo $this->Html->link('Fazer login', array('controller' => 'user', 'action' => 'login'), array("class" => "btn btn-danger"));
              }
            ?>

          </div>
          <div class="col-lg-3">
            <h2>Participantes</h2>
            <?php foreach($evento['Presenca'] as $u) {
              foreach($userss as $j) {
                if($u['user_id'] == $j['User']['id']) {
                  echo $j['User']['nome'] . '<br>';
                }
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>