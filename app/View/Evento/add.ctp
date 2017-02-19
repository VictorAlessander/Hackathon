<div class="container" class="contain-add">
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Crie seu evento</h2>
        <label for="inputText" class="sr-only">Nome do evento</label>
        <input type="text" id="inputText"  name="data[Evento][nome]" class="form-control" placeholder="Nome do evento" required="" autofocus="">
        <label for="inputLocal" class="sr-only">Descricao</label>
        <input type="text" id="inputDescricao"  name="data[Evento][descricao]" class="form-control" placeholder="Descricao..." required="">

        <label for="inputLocal" class="sr-only">Local</label>
        <input type="text" id="inputLocal"  name="data[Evento][local]" class="form-control" placeholder="Local" required="">

        <label for="inputVagas" class="sr-only">Vagas disponíveis</label>
        <input type="number" id="inputVagas"  name="data[Evento][vagas]" class="form-control" placeholder="Vagas disponíveis" min="0" required="">
      <div class="form-group">
      <?php echo $this->Form->input('Evento.categoria_id', array('options' => $ctgs, 'label' => 'Categoria', 'class' => 'form-control')); ?>
      </div>
      <div class="form-group">
      <div class="input select">
        <label for="preco">Preço</label>
        <select class="form-control" id="preco" name="data[Evento][preco]"  title="Preço">
          <option value="5">$5</option>
          <option value="10">$10</option>
          <option value="15">$15</option>
        </select>
        </div>
        </div>
        <div class="form-group">
        <div class="input select">
        <label for="inputData">Data</label>
        <input type="date" format="dd/mm/YYYY"  id="iData" class="form-control" placeholder="Data" required="">
        </div>
        </div>
        <input type="hidden" name="data[Evento][data]" format="dd/mm/YYYY"  id="inputData" class="form-control" placeholder="Data" required="">
        <input type="hidden" name="data[Evento][user_id]" value="<?=$authUser['id']?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
      </form>


    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#iData").change(function(){
          var dt = ($(this).val()).split('-');
          $("#inputData").val(dt[2] +'/'+ dt[1] +'/'+ dt[0]);
          console.log(dt);
          console.log($(this).val());
        });
      });
    </script>