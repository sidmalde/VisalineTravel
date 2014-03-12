<h1>
	<?=$title_for_layout;?>
</h1>

<div class="page-content">
	<div class="row">
		<div class="col-sm-4">
			<div class="admin-dashboard-tile">
				<a href="<?=$this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true));?>">
					<i class="fa fa-user fa-xl"></i>
					<p>Users</p>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="admin-dashboard-tile">
				<a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'index', 'admin' => true));?>">
					<i class="fa fa-bars fa-xl"></i>
					<p>CMS - Pages</p>
				</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="admin-dashboard-tile">
				<a href="<?=$this->Html->url(array('controller' => 'forum', 'action' => 'index', 'admin' => true));?>">
					<i class="fa fa-group fa-xl"></i>
					<p>Forum</p>
				</a>
			</div>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-sm-4">
			<div class="admin-dashboard-tile">
				<a href="<?=$this->Html->url(array('controller' => 'default', 'action' => 'form_index', 'admin' => true));?>">
					<i class="fa fa-user fa-xl"></i>
					<p>Contact Forms</p>
				</a>
			</div>
		</div>
	</div>
</div>