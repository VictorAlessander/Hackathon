    <style type="text/css">
    #gmap{
  width: 100%;
  height: 350px;
  margin: 0 auto;
}

#menu {
  width: 300px;
  margin: 15px auto;
  text-align:center;
}
#menu a.loc_link {
  background: #0f89cf;
  color: #fff;
  margin-right: 10px;
  display: inline-block;
  margin-bottom:10px;
  padding: 5px;
  border-radius: 3px;
  text-decoration: none;
}
#menu span#tool_tip {
  display: inline-block;
  margin-top: 10px;
}
</style>
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
          <img class="first-slide" src="http://www.jandira.com/public/midia/imagem/full/pacoca.png" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-size: 5em;">A plataforma perfeita para você aprender</h1>
              <br><br><br>
              <p style="font-size: 25px;">Aqui você usa uma moeda própria e não terá que gastar dinheiro para aprender. Além disto, todos os eventos são disponibilizados pelos nossos próprios usuários.</p>
              <p><a class="btn btn-lg btn-primary" href="user/add" role="button">Crie sua conta hoje</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="http://www.jandira.com/public/midia/imagem/full/pacoca.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-size: 5em;">Como Funciona?</h1>
              <br><br><br>
              <p style="font-size: 25px;"><b>1- Cadastre-se em nossa plataforma</b></p>
              <p style="font-size: 25px;"><b>2- Selecione um grupo de temas que sejam do seu interesse</b></p>
              <p style="font-size: 25px;"><b>3- Participe dos eventos</b></p>
              <!--<p><b>4- Avalie o evento</b></p>
              <p><b>4- Receba créditos por participar dos eventos</b></p>-->
              <p style="font-size: 25px;"><b>5- Use os créditos para comprar outros eventos e se especializar</b></p>
              <p style="font-size: 25px;"><b>6- Crie seu próprio evento e ganhe ainda mais créditos. Participe!</b></p>
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
<div id="gmap"></div>


<script type="text/javascript">
$(function(){
var map;
var LocA = [
    <?php 
  foreach($evts as $evt) {
    ?>
{
        lat: <?=$evt['Evento']['lat']?>,
        lon: <?=$evt['Evento']['long']?>,
        title: '<?=$evt["Evento"]["nome"]?>',
        html: <?php 
        echo ' " Evento: '. $evt["Evento"]["nome"] .' - <a href=\"/cake/evento/lista/'. $evt['Evento']['id'] .'\">Quero ir!</a>"';
         ?>,
        zoom: 4,
        icon: 'http://explorethepearl.com/wp-content/uploads/2013/06/1370640417424197618.png',
        animation: google.maps.Animation.DROP
    },
  <?php }  ?>
    ];
 
 map = new Maplace({
    locations: LocA,
    map_div: '#gmap',
    generate_controls: false,
    start: 0   
  }).Load();
  

$(".loc_link").click(function(){
  var newLoc = [{
        lat: $(this).data('lat'),
        lon: $(this).data('long'),
        title: $(this).data('title'),
        html: $(this).data('html'),
        zoom: 4,
        icon: 'http://maps.google.com/mapfiles/marker'+$(this).text()+'.png',
        animation:google.maps.Animation.DROP
    }];
  map.AddLocations(newLoc).Load();
  map.ViewOnMap($(this).index()+1);
});
});
</script>