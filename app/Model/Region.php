<?php
class Region extends AppModel {
	var $name = 'Region';
	var $order = 'display_order';
	var $actsAs =  array('Containable');
	var $displayField = 'region';
	
	var $hasMany = array(
		'Offer'
	);
	
	var $belongsTo = array(
		'Status'
	);
}
