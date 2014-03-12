<div class="row">
	<div class="col-sm-6">
		<div class="well">
			<div class="lead"><?=__('Login');?></div>
			<?=$this->Form->create('User', array('url' => array('action' => 'login'), 'class' => 'form-login'));?>
				<?=$this->Form->input('email', array('between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>', 'after' => '</div>'));?>
				<?=$this->Form->input('password', array('between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-asterisk"></i></span>', 'after' => '</div>'));?>
				<?=$this->Form->button(__('Login'), array('type' => 'submit', 'class' => 'btn btn-success'));?>
			<?=$this->Form->end();?>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row">
			<div class="well">
				<div class="lead"><?=__('Register');?></div>
				<?=$this->Form->create('User', array('url' => array('action' => 'register'), 'class' => 'form'));?>
				<div class="col-md-6">
					<?=$this->Form->input('firstname', array('required' => 'required', 'between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>', 'after' => '</div>'));?>
					<?=$this->Form->input('lastname', array('required' => 'required', 'between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>', 'after' => '</div>'));?>
					<?=$this->Form->input('date_of_birth', array('type' => 'text', 'between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>', 'after' => '</div>'));?>
					<?=$this->Form->button(__('Register'), array('type' => 'submit', 'class' => 'btn btn-success'));?>
				</div>
				<div class="col-md-6">
					<?=$this->Form->input('email', array('required' => 'required', 'between' => '<div class="input-group"><span class="input-group-addon"><strong>@</strong></span>', 'after' => '</div>'));?>
					<?=$this->Form->input('password', array('required' => 'required', 'between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-asterisk"></i></span>', 'after' => '</div>'));?>
					<?=$this->Form->input('confirm_password', array('required' => 'required', 'type' => 'password', 'between' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-asterisk"></i></span>', 'after' => '</div>'));?>
				</div>
				<?=$this->Form->end();?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>