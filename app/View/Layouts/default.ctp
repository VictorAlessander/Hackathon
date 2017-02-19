<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Paçoca Connection');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->css('carousel');
		echo $this->Html->css('site');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->Html->script('jquery-3.1.1.min'); ?>
	<?php echo $this->Html->script('bootstrap'); ?>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.13"> </script>
	<script type="text/javascript" src="http://maplacejs.com/dist/maplace.min.js" ></script>
	<div>

	<?php echo $this->Form->create('', array('url' => array('controller' => 'user','action' =>'login'),'id'=>'FrmPost'
  )); ?>
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
				<font size="16px">
              <?php echo $this->Html->link("Paçoca", '/', array('class'=> 'navbar-brand nav8')); ?>
            	</font>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
		       <?php 
				if(!$authUser){
				?>
		                <div style="float: right" class="form-group">
		                  <ul class="nav navbar-nav">
		                    <li>
		                      <input type="text" placeholder="Email" class="input-nav form-control" name="data[User][username]">
		                    </li>
		                    <li>
		                      <input type="password" placeholder="Senha" class="input-nav form-control" name="data[User][password]">
		                    </li>
		                    <li>
		                      <button type="submit" class="btn btn-success entrar">Entrar</button>
		                    </li>
		                    <li>
		                      <a href="/cake/user/add" class="cadastrese"><span class="btn btn-warning"> Cadastrar-se</span></a>
		                    </li>
		                  </ul>
		                </div>
		              <?php
		        
				} else {
				?>
				<div style="float: right" class="form-group"> 
		                 <ul class="nav navbar-nav">
		                   <li class="header-nav-item navbar-text"> <h6>Bem vindo, <?=$authUser["nome"]?>  &nbsp;   &nbsp; Créditos:  <?=$authUser["carteira"]?> ¢ <i class="glyphicon glyphicon-log-out"></i> &nbsp;
            					<?php
            					 echo $this->Html->link('Sair', array("controller" => "user", "action" => "logout"));
            					 ?>
          					</h6></li>
		                  </ul>
		                </div>
				<?php
				} 
				?>
            </div>
          </div>
        </nav>
        </form>
      </div>
    </div>
    <div>
		<div>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	<div class="container">
	  <footer class="footer-margin">
        <p class="pull-right"><a href="#">Ir para o topo</a></p>
        <p>&copy; 2017 Paçoca, Hackathon. &middot;  <a href="#"></a></p>
      </footer>
    </div>
	</div>


	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
