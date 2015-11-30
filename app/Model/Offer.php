<?php
class Offer extends AppModel {
	var $name = 'Offer';
	var $order = 'ref';
	var $actsAs =  array('Containable');
	var $displayField = 'title';
	
	var $belongsTo = array(
		'Region',
		'Status'
	);
	
	function getDisplayOrder($region){
		$this->contain();
		$options = array(
			'conditions' => array(
				'Offer.region_id' => $region
			),
			'fields' => array(
				'MAX(Offer.display_order) as max'
			)
		);
		$orderRef = $this->find('first', $options);
		$orderRef = (float) $orderRef[0]['max'];
		return $orderRef+1;
	}

	function moveUp($offerId) {
		$this->contain();
		$offer = $this->findById($offerId);		
		
		if ($offer['Offer']['display_order'] > 1) {
			$offer['Offer']['display_order']--;

			// Bubble down the replacement offer
			$offerToBeReplaced = $this->findByRegionIdAndDisplayOrder($offer['Offer']['region_id'], $offer['Offer']['display_order']);
			if (!empty($offerToBeReplaced)) {
				$offerToBeReplaced['Offer']['display_order']++;
				$this->save($offerToBeReplaced);
			}
			$this->save($offer);
		} else {
			// already top;
			return false;
		}
		return true;
	}

	function moveDown($offerId) {
		$this->contain();
		$offer = $this->findById($offerId);		
		
		if ($offer['Offer']['display_order'] > 1) {
			$offer['Offer']['display_order']++;

			// Bubble up the replacement offer
			$offerToBeReplaced = $this->findByRegionIdAndDisplayOrder($offer['Offer']['region_id'], $offer['Offer']['display_order']);
			if (!empty($offerToBeReplaced)) {
				$offerToBeReplaced['Offer']['display_order']--;
				$this->save($offerToBeReplaced);
			}
			$this->save($offer);
		} else {
			// already top;
			return false;
		}
		return true;
	}

	function softDelete($offerId) {
		$this->contain();
		$offer = $this->findById($offerId);		
		$offer['Offer']['publish'] = 0;
		if ($this->save($offer)) {
			return true;
		} else {
			return false;
		}
	}

	function restoreOffer($offerId) {
		$this->contain();
		$offer = $this->findById($offerId);		
		$offer['Offer']['publish'] = 1;
		if ($this->save($offer)) {
			return true;
		} else {
			return false;
		}
	}
	
	var $validate = array(
		'region_id' => array(
			'rule' => array(
				'notEmpty',
			),
			'message' => 'This is a required field and cannot be left empty',			
		),
		'ref' => array(
			'rule' => array(
				'notEmpty',
			),
			'message' => 'This is a required field and cannot be left empty',			
		),
		'title' => array(
			'rule' => array(
				'notEmpty',
			),
			'message' => 'This is a required field and cannot be left empty',			
		),
		'description' => array(
			'rule' => array(
				'notEmpty',
			),
			'message' => 'This is a required field and cannot be left empty',			
		),
		'price' => array(
			'rule' => array(
				'notEmpty',
			),
			'message' => 'This is a required field and cannot be left empty',			
		),
	);
}