<div class="row">
	<?
		foreach($regions as $region) {
			echo $this->element('home-box', array('region' => $region));
		}
	?>
	
	<?
		// foreach($regions as $region) {
		// 	echo $this->element('home-box', array('region' => $region));
		// }
	?>
</div>