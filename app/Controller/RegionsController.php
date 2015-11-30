<?php
App::uses('AppController', 'Controller');

class RegionsController extends AppController {
		
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('bodyClass', 'regions');
		$this->Auth->allow();
		$this->layout = 'admin';
	}
	
	public function admin_index() {
		$this->Region->contain(array(
			'Offer.id'
		));
		$regions = $this->Region->find('all');
		
		$title_for_layout = __('Regions');
		$this->set(compact(array('regions', 'title_for_layout')));
	}
	
	public function admin_add() {
		if (!empty($this->request->data)) {
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('Region has been created'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Region could not be created, please try again'), 'flash_failure');
			}
		}
		
		$title_for_layout = __('Region :: Add');
		$this->set(compact(array('title_for_layout')));
	}
	
	public function admin_edit() {
		if (empty($this->request->params['region'])) {
			$this->Session->setFlash(__('Region could not be found'), 'flash_failure');
			$this->redirect($this->referer());
		}
		
		if (!empty($this->request->data)) {
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('Region has been created'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Region could not be created, please try again'), 'flash_failure');
			}
		}
		
		$this->Region->contain();
		$this->request->data = $region = $this->Region->findById($this->request->params['region']);
		$title_for_layout = __('Region :: Edit');
		$this->set(compact(array('region', 'title_for_layout')));
	}
	
	public function admin_delete() {
		if (empty($this->request->params['region'])) {
			$this->Session->setFlash(__('Region could not be found'), 'flash_failure');
			$this->redirect($this->referer());
		}
		
		if ($this->Region->delete($this->request->params['region'])) {
			$this->Session->setFlash(__('Region has been deleted'), 'flash_success');
		} else {
			$this->Session->setFlash(__('Region could not be deleted, please try again'), 'flash_failure');
		}
		$this->redirect(array('action' => 'index'));
	}
}
