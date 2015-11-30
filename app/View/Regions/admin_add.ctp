<h2>
	<?=$title_for_layout;?>
	<div class="btn-group pull-right">
		<?=$this->Html->link('<i class="fa fa-plus"></i> '.__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-sm btn-danger', 'escape' => false));?>
	</div>
</h2>

<div class="">
	<div class="col-md-6 col-md-offset-3">
		<div class="well">
			<?=$this->Form->create('Region', array('class' => 'form'));?>
				<?=$this->Form->input('region');?>
				<?=$this->Form->input('description');?>
				<?=$this->Form->input('display_order');?>
				<?=$this->Form->button(__('Save'), array('type' => 'submit', 'class' => 'btn btn-success'));?>
			<?=$this->Form->end();?>
		</div>
	</div>
</div>