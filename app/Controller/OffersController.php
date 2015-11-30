<?php
App::uses('AppController', 'Controller');

class OffersController extends AppController {
	
	var $uses = array(
		'Offer',
		'Region',
		'Tblafrica',
		'Tblasia',
		'Tblauz',
		'Tblfareast',
		'Tblmiddleeast',
		'Tblspecial'
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('bodyClass', 'groups');
		$this->Auth->allow();
		$this->layout = 'admin';
	}
	
	public function admin_index() {
		$options = array();
		$this->Region->contain(array(
			'Offer' => array(
				'conditions' => array(
					'Offer.publish' => true,
				),
				'order' => array(
					'Offer.display_order' => 'ASC'
				),
			),
		));
		$regions = $this->Region->find('all', $options);

		$options = array(
			'conditions' => array(
				'Offer.publish' => false,
			),
		);
		$this->Offer->contain(array(
			'Region.region'
		));
		$deletedOffers = $this->Offer->find('all', $options);
		
		// debug($regions);
		
		// die;
		$title_for_layout = __('Offers');
		$this->set(compact(array('regions', 'deletedOffers', 'title_for_layout')));
	}
	
	public function admin_add() {
		if (!empty($this->request->data)) {
			$this->request->data['Offer']['publish'] = 1;
			$this->request->data['Offer']['date_start'] = date("Y-m-d 00:00:00", strtotime($this->request->data['Offer']['date_start']));
			$this->request->data['Offer']['date_end'] = date("Y-m-d 23:59:59", strtotime($this->request->data['Offer']['date_end']));
			
			if ($this->Offer->save($this->request->data)) {
				$this->Session->setFlash(__('Offer has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Offer could not be saved, please try again'), 'flash_failure');
			}
		}
		
		$title_for_layout = __('Offers :: Add');
		$regions = $this->Region->find('list');
		
		$this->set(compact(array('title_for_layout', 'regions')));
	}
	
	public function admin_edit() {
		if (empty($this->request->params['offer'])) {
			$this->Session->setFlash(__('Invalid Offer'), 'flash_failure');
			$this->redirect($this->referer());
		}
		
		if (!empty($this->request->data)) {
			$this->request->data['Offer']['date_start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Offer']['date_start']));
			$this->request->data['Offer']['date_end'] = date("Y-m-d H:i:s", strtotime($this->request->data['Offer']['date_end']));
			
			if ($this->Offer->save($this->request->data)) {
				$this->Session->setFlash(__('Offer has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Offer could not be saved, please try again'), 'flash_failure');
			}
		}
		
		$title_for_layout = __('Offers :: Edit');
		$regions = $this->Region->find('list');
		
		$this->request->data = $this->Offer->findById($this->request->params['offer']);
		$this->request->data['Offer']['date_start'] = date("d-M-Y", strtotime($this->request->data['Offer']['date_start']));
		$this->request->data['Offer']['date_end'] = date("d-M-Y", strtotime($this->request->data['Offer']['date_end']));
		
		$offer = $this->request->data;
		
		$this->set(compact(array('title_for_layout', 'regions', 'offer')));
	}
	
	public function admin_move_up() {
		$this->layout = false;
		$this->autoRedirect = false;
		if (empty($this->request->params['offer'])) {
			$this->Session->setFlash(__('Invalid Offer'), 'flash_failure');
			$this->redirect($this->referer());
		}

		if ($this->Offer->moveUp($this->request->params['offer'])) {
			$this->Session->setFlash(__('Offer has been moved up'), 'flash_success');
		} else {
			$this->Session->setFlash(__('Offer could not be moved up, please try again'), 'flash_failure');
		}
		$this->redirect($this->referer());
	}
	
	public function admin_move_down() {
		$this->layout = false;
		$this->autoRedirect = false;
		if (empty($this->request->params['offer'])) {
			$this->Session->setFlash(__('Invalid Offer'), 'flash_failure');
			$this->redirect($this->referer());
		}

		if ($this->Offer->moveDown($this->request->params['offer'])) {
			$this->Session->setFlash(__('Offer has been moved down'), 'flash_success');
		} else {
			$this->Session->setFlash(__('Offer could not be moved down, please try again'), 'flash_failure');
		}
		$this->redirect($this->referer());
	}

	public function admin_delete() {
		$this->layout = false;
		$this->autoRedirect = false;
		if (empty($this->request->params['offer'])) {
			$this->Session->setFlash(__('Invalid Offer'), 'flash_failure');
		} else {
			if ($this->Offer->softDelete($this->request->params['offer'])) {
				$this->Session->setFlash(__('Offer has been deleted'), 'flash_success');
			} else {
				$this->Session->setFlash(__('Offer could not be deleted, please try again'), 'flash_failure');
			}
		}
		$this->redirect($this->referer());
	}

	public function admin_restore_offer() {
		$this->layout = false;
		$this->autoRedirect = false;
		if (empty($this->request->params['offer'])) {
			$this->Session->setFlash(__('Invalid Offer'), 'flash_failure');
		} else {
			if ($this->Offer->restoreOffer($this->request->params['offer'])) {
				$this->Session->setFlash(__('Offer has been restored'), 'flash_success');
			} else {
				$this->Session->setFlash(__('Offer could not be restored, please try again'), 'flash_failure');
			}
		}
		$this->redirect($this->referer());
	}

	public function admin_migrate() {
		$this->layout = false;
		$this->autoRender = false;
		
		$oldTables = array(
			'Tblafrica' => '54a1942a-3a78-473d-b66c-0574d96041f1',
			'Tblasia' => '54a19432-51b8-4ef1-8286-0574d96041f1',
			'Tblauz' => '54a19459-92d4-45d4-a55b-0574d96041f1',
			'Tblfareast' => '54a1943a-a320-47b2-b481-0574d96041f1',
			'Tblmiddleeast' => '54a19441-31e4-4899-90e8-0574d96041f1',
			'Tblspecial' => '54a19460-c120-4180-9f38-0574d96041f1',
		);
		foreach($oldTables as $oldTable => $regionId) {
			$results = $this->$oldTable->find('all');
			
			foreach ($results as $result) {
				$displayOrder = $this->Offer->getDisplayOrder($regionId);
				
				$newOffer = array(
					'region_id' => $regionId,
					'ref' => $result[$oldTable]['Reference'],
					'title' => $result[$oldTable]['Offer_Name'],
					'description' => $result[$oldTable]['Details'],
					'display_order' => $displayOrder,
					'keywords' => $result[$oldTable]['Keywords'],
					'price' => $result[$oldTable]['Price'],
					'date_start' => date("Y-m-d 00:00:00", strtotime($result[$oldTable]['Start_Date'])),
					'date_end' => date("Y-m-d 00:00:00", strtotime($result[$oldTable]['End_Date'])),
				);
				// debug($newOffer);
				// die;
				$this->Offer->create();
				$this->Offer->save($newOffer);
			}
		}
		
		debug('done');
		die;
	}

	public function admin_init_mass() {
		$this->layout = false;
		$this->autoRender = false;
		
		$regions = $this->Offer->Region->find('list');
		foreach ($regions as $regionId => $region) {
			for($i=0; $i<26; $i++) {
				$ref = $this->generateRandomString('', 5);
				$monthStart = rand(1,12);
				$dayStart = rand(1,12);
				$offer = array(
					'region_id' => $regionId,
					'ref' => $ref,
					'display_order' => rand(2,99),
					'title' => __('Test offer for %s %s', $region, $ref),
					'description' => 'Test',
					'date_start' => '2015-'.rand(1,12).'-'.rand(1,28).' 09:00:00',
					'date_end' => '2015-'.rand($monthStart,12).'-'.rand($dayStart,28).' 09:00:00',
					'price' => rand(200,1899),
					'publish' => true
				);
				$this->Offer->create();
				$this->Offer->save($offer);
			}
		}
	}
}
