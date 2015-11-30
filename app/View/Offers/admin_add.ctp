<h2>
	<?=$title_for_layout;?>
	<div class="btn-group pull-right">
		<?=$this->Html->link(__('Cancel'), array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-danger btn-sm'));?>
	</div>
</h2>

<div class="v-outer20">
	<div class="well">
		<?=$this->Form->create('Offer', array('class' => 'form'));?>
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<?=$this->Form->input('region_id', array('empty' => __('Please select a region')));?>
						</div>
						<div class="col-md-6">
							<?=$this->Form->input('ref');?>
						</div>
					</div>
					<?=$this->Form->input('title');?>
					<?=$this->Form->input('description');?>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<?=$this->Form->input('price');?>
						</div>
						<div class="col-md-6">
							<?=$this->Form->input('display_order', array('value' => 1));?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<?=$this->Form->input('date_start', array('type' => 'text', 'class' => 'datepicker'));?>
						</div>
						<div class="col-md-6">
							<?=$this->Form->input('date_end', array('type' => 'text', 'class' => 'datepicker'));?>
						</div>
					</div>
					<?=$this->Form->input('keywords');?>
				</div>
			</div>
				<?=$this->Form->button(__('Save'), array('type' => 'submit', 'class' => 'btn btn-success'));?>
		<?=$this->Form->end();?>
		<div class="clear"></div>
	</div>
</div>