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
<html ng-app="ruanClient">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
	?>
	<?php 
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('jquery.dataTables.min.css');
	 ?>
	<?php
		echo $this->Html->script('jquery-3.2.1.min.js');
		echo $this->Html->script('bootstrap.min.js');
		echo $this->Html->script('jquery.mask.js');
		echo $this->Html->script('angular.min.js');
		echo $this->Html->script('jquery.dataTables.min.js');
		echo $this->Html->script('angular-route.js');
		echo $this->Html->script('dirPagination.js');
		echo $this->Html->script('app'.DS.'app.js');
	?>
</head>
<body>
	<div id="container-fluid" >
		<div id="header" class="row">
			<div  class="col-lg-12">
				<h1 class="text-center">CRUD com Angular e CAKEPHP by Ruan</h1>
			</div>
		</div>
		<div id="content" class="row">
			
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="row">
			<div class="col-lg-12">
				<p class="text-center"><?php 
					echo $this->Html->link("Acesse meu github",'https://github.com/lordruan');?></p>
			</div>
		</div>
	</div>
</body>
</html>
