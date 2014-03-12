<div class="row">
	<div class="col-sm-3">
		<p class="text-center">Advert b</p>
	</div>
	<div class="col-sm-6">
		<a href="/">
			<div class="logo text-center">
				9G<br />
				Ninth Galaxy<br />
				Art Universe<br />
			</div>
		</a>
	</div>
	<div class="col-sm-3">
		<div class="header-social-row">
			<?=$this->Form->create('Search', array('url' => array('controller' => 'pages', 'action' => 'search')));?>
			<?=$this->Form->input('query', array('type' => 'search', 'label' => false, 'between' => '<div class="input-group">', 'after' => '<span class="input-group-btn"><button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button></span></div>'));?>
			<?=$this->Form->end();?>
		</div>
		<div class="header-social-row">
			<a href="https://www.facebook.com/NeuroNulaUK"><i class="fa fa-facebook-square fa-5"></i></a>
			<a href="https://twitter.com/NeuroNula"><i class="fa fa-twitter-square fa-5"></i></a>
			<a href="https://plus.google.com/118443430812838933016/posts"><i class="fa fa-google-plus-square fa-5"></i></a>
		</div>
	</div>
</div>