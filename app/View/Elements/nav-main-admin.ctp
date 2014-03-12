<div class="row">
	<div class="col-xs-12">
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<a href="/" class="navbar-brand"><i class="fa fa-home fa-lg"></i></a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav main-nav">
					<li><?=$this->Html->link(__('Dashboard'), array('controller' => 'pages', 'action' => 'dashboard', 'admin' => true));?></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><?=__('Users');?> <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="User Management">
							<li><?=$this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index'));?></li>
							<li><?=$this->Html->link(__('Groups'), array('controller' => 'groups', 'action' => 'index'));?></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><?=__('CMS');?> <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="User Management">
							<li><?=$this->Html->link(__('Pages'), array('controller' => 'pages', 'action' => 'index'));?></li>
							<li><?=$this->Html->link(__('Forum'), array('controller' => 'orum', 'action' => 'index'));?></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/logout"><?=__('Logout');?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>