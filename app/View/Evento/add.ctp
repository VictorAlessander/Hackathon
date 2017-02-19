<div class="container" style="width: 600px; margin-top: 60px; margin-bottom: 40px">
      <form class="form-signin">
        <h2 class="form-signin-heading">Crie seu evento</h2>
        <label for="inputText" class="sr-only">Nome do evento</label>
        <input type="text" id="inputText" class="form-control" placeholder="Nome do evento" required="" autofocus="">
        
        <label for="inputLocal" class="sr-only">Local</label>
        <input type="text" id="inputLocal" class="form-control" placeholder="Local" required="">

        <label for="inputVagas" class="sr-only">Vagas disponíveis</label>
        <input type="number" id="inputVagas" class="form-control" placeholder="Vagas disponíveis" min="0" required="">

        <select class="form-control" title="Categoria">
          <option value="Exterior">Exterior</option>
          <option value="História">História</option>
          <option value="Moda e Beleza">Moda e Beleza</option>
          <option value="Natureza">Natureza</option>
          <option value="Política">Política</option>
          <option value="Tecnologia">Tecnologia</option>
        </select>

        <!--<label for="inputPreço" class="sr-only">Preço</label>-->
        <select class="form-control" title="Preço">
          <option value="5">$5</option>
          <option value="10">$10</option>
          <option value="15">$15</option>
        </select>
        <!--<input type="" id="inputPreço" class="form-control" placeholder="Preço" required>-->

        <label for="inputData" class="sr-only">Data</label>
        <input type="date" id="inputData" class="form-control" placeholder="Data" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
      </form>


    </div>