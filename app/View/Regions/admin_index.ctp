<h2>
	<?=$title_for_layout;?>
	<div class="btn-group pull-right">
		<?=$this->Html->link('<i class="fa fa-plus"></i> '.__('New'), array('action' => 'add'), array('class' => 'btn btn-sm btn-primary', 'escape' => false));?>
	</div>
</h2>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<? if(!empty($regions)): ?>
			<table class="table table-admin table-xl table-condensed table-bordered">
				<thead>
					<tr>
						<th><?=__('Region');?></th>
						<th><?=__('Offers');?></th>
						<th class="text-center"><?=__('Order');?></th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<? foreach($regions as $region): ?>
						<tr>
							<td><?=$region['Region']['region'];?></td>
							<td class="text-center"><?=count($region['Offer']);?></td>
							<td class="text-center"><?=$region['Region']['display_order'];?></td>
							<td class="condensed nowrap">
								<?=$this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', 'region' => $region['Region']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning'));?>
								<?=$this->Html->link('<i class="fa fa-trash"></i>', array('action' => 'delete', 'region' => $region['Region']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger'));?>
							</td>
						</tr>
					<? endforeach; ?>
					<tr>
						<?=$this->Form->create('Region', array('url' => array('action' => 'add')));?>
							<td><?=$this->Form->input('region', array('placeholder' => 'Region', 'label' => false, 'type' => 'text', 'value' => ''));?></td>
							<td>&nbsp;</td>
							<td><?=$this->Form->input('display_order', array('placeholder' => 'Order', 'label' => false));?></td>
							<td><?=$this->Form->button(__('Save'), array('class' => 'btn btn-md btn-success'));?></td>
						<?=$this->Form->end;?>
					</tr>
				</tbody>
			</table>
		<? else: ?>
			<div class="alert alert-info">
				<p><?=__('There are currently no regions');?></p>
			</div>
		<? endif; ?>
	</div>
</div>