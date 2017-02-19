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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
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
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->Html->script('jquery-3.1.1.min'); ?>
	<?php echo $this->Html->script('bootstrap'); ?>
	<div>

	<?php echo $this->Form->create('', array('url' => array('controller' => 'user','action' =>'login'),'id'=>'FrmPost'
  )); ?>
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <?php echo $this->Html->link('Paçoca', '/', array('class'=> 'navbar-brand')); ?>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
		       <?php 
				if(count($authUser) < 1){
				echo '
		                <div style="float: right" class="form-group">
		                  <ul class="nav navbar-nav">
		                    <li>
		                      <input type="text" placeholder="Email" class="form-control" name="data[User][username]" style="margin-top: 10px; margin-right: 5px">
		                    </li>
		                    <li>
		                      <input type="password" placeholder="Senha" class="form-control" name="data[User][password]" style="margin-top: 10px; margin-right: 5px">
		                    </li>
		                    <li>
		                      <button type="submit" class="btn btn-success" style="margin-top: 10px">Entrar</button>
		                    </li>
		                  </ul>
		                </div>';
		        
				} else {
				echo '<div style="float: right" class="form-group"> '.
		                 ' <ul class="nav navbar-nav">'.
		                   ' <li class="header-nav-item navbar-text"> <h6>Bem vindo, '. $authUser["nome"] .' &nbsp;   &nbsp; Créditos: '. $authUser["carteira"] .'¢ <i class="glyphicon glyphicon-log-out"></i> &nbsp;';
            			echo		$this->Html->link('Sair', array("controller" => "user", "action" => "logout"));
          			echo		'</h6></li>'.
		                 ' </ul>'.
		               ' </div>';

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
	  <footer style="margin-top: 30px;">
        <p class="pull-right"><a href="#">Ir para o topo</a></p>
        <p>&copy; 2017 Paçoca, Hackathon. &middot;  <a href="#"></a></p>
      </footer>
    </div>
	</div>


	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
