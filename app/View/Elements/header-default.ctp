<div class="row">
	<div class="col-sm-3">
		
	</div>
	<div class="col-sm-6">
		<a href="/"><div class="logo"></div></a>
	</div>
	<div class="col-sm-3">
		<div class="header-social-row">
			<a href="callto:02089078826"><i class="fa fa-phone-square fa-3"></i> <b>020 8907 8826</b></a><br />
			<a href="mailto:sales@visaline.co.uk"><i class="fa fa-envelope fa-3"></i> sales@visaline.co.uk</a>
		</div>
		<div class="header-social-row">
			<?=$this->Form->create('Search', array('url' => array('controller' => 'pages', 'action' => 'search')));?>
			<?=$this->Form->input('query', array('type' => 'search', 'label' => false, 'between' => '<div class="input-group">', 'after' => '<span class="input-group-btn"><button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button></span></div>'));?>
			<?=$this->Form->end();?>
		</div>
	</div>
</div>