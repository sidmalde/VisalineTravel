<!DOCTYPE html>
<html>
<head>
	<?=$this->Html->charset(); ?>
	<title><?=$title_for_layout;?></title>
	<?=$this->Html->meta('icon');?>

	<?=$this->fetch('meta');?>
	<?/* =$this->fetch('css');?>
	<?=$this->fetch('script'); */?>
	
	<?=$this->Html->script('jquery-1.10.2.min'); ?>
	
	
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
	
	<?=$this->Html->css('bootstrap'); ?>
	
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
	<?=$this->Html->css('core'); ?>
	
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
	<?=$this->Html->script('bootstrap.min'); ?>
	<?=$this->Html->script('core'); ?>
</head>
<body>
	<div class="container">
		<div id="content" class="row">
			<div class="col-xs-12">
				<?=$this->element('header-default');?>
				<?=$this->element('nav-main-default');?>
				<div class="row">
					<div class="col-md-12">
						<div class="page-content-left">
							<?=$this->fetch('content'); ?>
						</div>
					</div>
					<!--<div class="col-md-3">
						<div class="page-content-right">
							<?=$this->element('right-contact-form');?>
						</div>
					</div>-->
				</div>
			</div>
			
		</div>
		<br />
		<div id="footer" class="row">
			<div class="col-xs-12">
			</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
	<?=$this->element('flash_container');?>
</body>
</html>
