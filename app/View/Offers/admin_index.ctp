<h2>
	<?=$title_for_layout;?>
	<div class="btn-group pull-right">
		<?=$this->Html->link('<i class="fa fa-plus"></i> '.__('Add Offer'), array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm'));?>
	</div>
</h2>

<div class="v-outer20">
	<ul class="nav nav-tabs" role="tablist">
		<? $i=0;foreach($regions as $region): ?>
			<?  $active=($i == 0) ? 'active' : '' ?>
			<li role="presentation" class="<?=$active;?>"><a href="#<?=Inflector::slug($region['Region']['region'], "-");?>" role="tab" data-toggle="tab"><?=$region['Region']['region'];?></a></li>
		<? $i++;endforeach; ?>
		<li role="presentation"><a href="#deletedOffers" role="tab" data-toggle="tab"><?=__('Deleted Offers');?></a></li>
	</ul>
	
	<div class="tab-content">
		<? $i=0;foreach($regions as $region): ?>
			<?  $active=($i == 0) ? 'active' : '' ?>
			<div role="tabpanel" class="tab-pane fade in <?=$active;?>" id="<?=Inflector::slug($region['Region']['region'], "-");?>">
				<?if(!empty($region['Offer'])): ?>
					<table class="table table-condensed table-bordered table-hover datatable">
						<thead>
							<tr>
								<th class="text-center"><?=__('Order');?></th>
								<th class="text-center"><?=__('Ref');?></th>
								<th class="text-center"><?=__('Title');?></th>
								<th class="text-center"><?=__('Price');?></th>
								<th class="text-center"><?=__('Start');?></th>
								<th class="text-center"><?=__('End');?></th>
								<th class="text-center">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<? foreach($region['Offer'] as $offer): ?>
								<tr<?=(strtotime($offer['date_end']) < strtotime('now')) ? ' class="warning"' : ' class="success"'?>>
									<td class="condensed nowrap text-center"><?=$offer['display_order'];?></td>
									<td class="condensed nowrap text-center"><?=$offer['ref'];?></td>
									<td><?=$offer['title'];?></td>
									<td class="condensed nowrap text-center"><?=$this->Number->currency($offer['price'], 'GBP');?></td>
									<td class="condensed nowrap"><?=date("d-M-Y H:i", strtotime($offer['date_start']));?></td>
									<td class="condensed nowrap"><?=date("d-M-Y H:i", strtotime($offer['date_end']));?></td>
									<td class="condensed nowrap">
										<?=$this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', 'offer' => $offer['id']), array('escape' => false, 'class' => 'btn btn-sm btn-info'));?>
										<?=$this->Html->link('<i class="fa fa-arrow-up"></i>', array('action' => 'move_up', 'offer' => $offer['id']), array('escape' => false, 'class' => 'btn btn-sm btn-info'));?>
										<?=$this->Html->link('<i class="fa fa-arrow-down"></i>', array('action' => 'move_down', 'offer' => $offer['id']), array('escape' => false, 'class' => 'btn btn-sm btn-info'));?>
										<?=$this->Html->link('<i class="fa fa-trash"></i>', array('action' => 'delete', 'offer' => $offer['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger'));?>
									</td>
								</tr>
							<? endforeach; ?>
						</tbody>
					</table>
				<? else: ?>
					<div class="v-outer20">
					<div class="alert alert-info"><?=__('There are no offers for the region %s', $region['Region']['region']);?></div>
					</div>
				<? endif; ?>
			</div>
		<? $i++;endforeach; ?>
		<div role="tabpanel" class="tab-pane fade in" id="deletedOffers">
			<?if(!empty($deletedOffers)): ?>
				<table class="table table-condensed table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center"><?=__('Region');?></th>
							<th class="text-center"><?=__('Ref');?></th>
							<th class="text-center"><?=__('Title');?></th>
							<th class="text-center"><?=__('Price');?></th>
							<th class="text-center"><?=__('Start');?></th>
							<th class="text-center"><?=__('End');?></th>
							<th class="text-center">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<? foreach($deletedOffers as $offer): ?>
							<tr>
								<td class="condensed nowrap text-center"><?=$offer['Region']['region'];?></td>
								<td class="condensed nowrap text-center"><?=$offer['Offer']['ref'];?></td>
								<td><?=$offer['Offer']['title'];?></td>
								<td class="condensed nowrap text-center"><?=$offer['Offer']['price'];?></td>
								<td class="condensed nowrap"><?=date("d-M-Y H:i", strtotime($offer['Offer']['date_start']));?></td>
								<td class="condensed nowrap"><?=date("d-M-Y H:i", strtotime($offer['Offer']['date_end']));?></td>
								<td class="condensed nowrap">
									<?=$this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'restore_offer', 'offer' => $offer['Offer']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-info'));?>
								</td>
							</tr>
						<? endforeach;?>
					</tbody>
				</table>
			<? else: ?>
				<div class="v-outer20">
				<div class="alert alert-info"><?=__('There are no deleted offers');?></div>
				</div>
			<? endif; ?>
		</div>
	</div>
</div>