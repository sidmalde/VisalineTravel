<?=$this->Form->create('User', array('url' => $this->Html->url(array('controller' => 'users', 'action' => 'edit', 'user' => $user['User']['id'], 'admin' => true)), 'class' => 'form form-user-note-edit', 'type' => 'file')); ?>
	<div class="row">
		<div class="col-xs-12 page-header">
			<div class="row">
				<div class="col-xs-8"><h3><?=@$title_for_layout;?></h3></div>
				<div class="col-xs-3">
					<div class="btn-group pull-right">
						<?=$this->Html->link(__('Back'), array('action' => 'index'), array('class' => 'btn btn-primary'));?>
						<?=$this->Form->submit(__('Save Changes'), array('div' => false, 'label' => false, 'type' => 'submit', 'class' => 'btn btn-success'));?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="well">
		<div class="row">
			<div class="col-xs-6">
				<?=$this->Form->hidden('id');?>
				<?=$this->Form->input('group_id');?>
				<?=$this->Form->input('email');?>
				<?=$this->Form->input('firstname');?>
				<?=$this->Form->input('lastname');?>
			</div>
			<div class="col-xs-6">
				<?=$this->Form->input('gender', array('empty' => __('Please select an option:'), 'options' => $userGenders));?>
				<?=$this->Form->input('date_of_birth', array('type' => 'text', 'value' => date("d-M-Y", strtotime($user['User']['date_of_birth']))));?>
				<?=$this->Form->input('phone');?>
				<?=$this->Form->input('mobile');?>
			</div>
		</div>
	</div>
<?=$this->Form->end(); ?>