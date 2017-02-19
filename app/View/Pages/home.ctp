    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>A plataforma perfeita para você aprender</h1>
              <p>Aqui você usa uma moeda própria e não terá que gastar dinheiro para aprender. Além disto, todos os eventos são disponibilizados pelos nossos próprios usuários.</p>
              <p><a class="btn btn-lg btn-primary" href="user/add" role="button">Crie sua conta hoje</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Como Funciona?</h1>
              <p><b>1- Cadastre-se em nossa plataforma</b></p>
              <p><b>2- Selecione um grupo de temas que sejam do seu interesse</b></p>
              <p><b>3- Participe dos eventos</b></p>
              <!--<p><b>4- Avalie o evento</b></p>
              <p><b>4- Receba créditos por participar dos eventos</b></p>-->
              <p><b>5- Use os créditos para comprar outros eventos e se especializar</b></p>
              <p><b>6- Crie seu próprio evento e ganhe ainda mais créditos. Participe!</b></p>
            </div>
          </div>
        </div>
        <!--<div class="item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>-->
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
      <?php foreach($categorias as $i) { ?>
        <div class="col-lg-4">
          <img class="img-circle" src="<?=$i['Categoria']['imagem']?>" alt="Generic placeholder image" width="140" height="140">
          <h2><?=$i['Categoria']['nome']?></h2>
          <p>Temas: <?=$i['Categoria']['descricao']?></p>
          <p><?php echo $this->Html->link('Mais &raquo;', array('controller'=>'categoria','action'=>'lista', $i['Categoria']['id']), array('escape'=>false, 'class' => 'btn btn-default')); ?></p>
        </div><!-- /.col-lg-4 -->
        <?php } ?>
      </div><!-- /.row -->

    </div><!-- /.container -->