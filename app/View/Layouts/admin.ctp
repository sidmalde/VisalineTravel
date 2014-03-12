<!DOCTYPE html>
<html>
<head>
	<?=$this->Html->charset(); ?>
	<title><?=$title_for_layout;?></title>
	<?=$this->Html->meta('icon');?>

	<?=$this->fetch('meta');?>
	<?=$this->fetch('css');?>
	<?=$this->fetch('script');?>
	
	<script src="http://code.jquery.com/jquery-1.9.1.js" rel="stylesheet"></script>

	
	<?=$this->Html->css('font-awesome/css/font-awesome.min'); ?>
	<?/* =$this->Html->css('../js/redactor/redactor');  */?>
	<?=$this->Html->css('bootstrap'); ?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<?#=$this->Html->css('slate_bootstrap.min');?>
	<?#=$this->Html->css('cerulean_bootstrap.min');?>
	<?=$this->Html->css('core'); ?>
	
	<?=$this->Html->script('bootstrap.min'); ?>
	<?=$this->Html->script('nicedit/nicEdit'); ?> 
	<?=$this->Html->script('core'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?=$this->element('header-admin');?>
				<?=$this->element('nav-main-admin');?>
				<?=$this->fetch('content'); ?>
			</div>
		</div>
		<div id="footer" class="row">
			<div class="col-xs-12">
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
	<?=$this->element('flash_container');?>
</body>
</html>
