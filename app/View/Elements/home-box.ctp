<div class="col-sm-4">
	<div class="panel panel-transparent">
		<div class="panel-heading">
			<h3 class="panel-title text-center"><b><?=$region['Region']['region'];?></b></h3>
		</div>
		<div class="panel-body">
			<table class="table table-no-border table-condensed">
				<tbody>
					<? foreach($region['Offer'] as $offer): ?>
						<tr>
							<td class="text-default"><?=$this->Html->link($offer['title'], '#');?></td>
							<td class="condensed"><?=$this->Html->link($this->Number->currency($offer['price'], 'GBP'), '#', array('escape' => false, 'class' => 'btn btn-xs btn-danger'));?></td>
						</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer text-small">
			<?=$this->Html->link('More Offers', '#', array('class' => 'btn btn-md btn-block btn-more btn-no-curve'));?>
		</div>
	</div>
</div>