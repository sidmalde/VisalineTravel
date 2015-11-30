<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	var $uses = array('Page', 'Region');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('bodyClass', 'pages');
		$this->Auth->allow();
		$this->layout = 'admin';
	}
	
	public function display() {
		$path = func_get_args();
		$this->layout = 'default';

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	
	function view() {
		if (empty($this->request->url)) {
			$url = '/';
			$fullUrl = $_SERVER['SERVER_NAME'].$url;
		} else {
			$url = '/'.$this->request->url;
			$fullUrl = $_SERVER['SERVER_NAME'].$url;
		}
		
		$this->Page->contain();
		$page = $this->Page->findByUrl($url);
		if (empty($page)) {
			$this->Session->setFlash(__('The page you requested %s, could not be found.', $fullUrl), 'flash_failure');
			$this->redirect('/');
		} else {
			$this->layout = 'default';
			$title_for_layout = $page['Page']['title'];
			$this->set(compact(array('page', 'title_for_layout')));
		}
	}
	
	function home() {
		$this->layout = 'default';
		$regions = array(
			0 => array(
				'Region' => array(
					'id' => 'lascnaspocnsapoc',
					'ref' => '3417',
					'region' => 'Wild Africa',
				),
				'Offer' => array(
					0 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3417/12',
						'title' => 'NAIROBI Direct SPECIAL OFFER',
						'price' => '520',
					),
					1 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3417/13',
						'title' => 'NAIROBI Extra SPECIAL OFFER',
						'price' => '499',
					),
					2 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3417/14',
						'title' => 'ENTEBBE SPECIAL OFFER',
						'price' => '300',
					),
				),
			),
			1 => array(
				'Region' => array(
					'id' => 'lascnaspocnsapoc',
					'ref' => '3418',
					'region' => 'Spicy Asia',
				),
				'Offer' => array(
					0 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3418/12',
						'title' => 'MUMBAI Direct EXTRA SPECIAL',
						'price' => '485',
					),
					1 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3418/13',
						'title' => 'Fly DREAMLINER MUMBAI DELHI Direct Specials',
						'price' => '465',
					),
					2 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3418/14',
						'title' => 'MUMBAI DELHI Direct SUPER Special Offers',
						'price' => '475',
					),
				),
			),
			2 => array(
				'Region' => array(
					'id' => 'lascnaspocnsapoc',
					'ref' => '3419',
					'region' => 'Far East',
				),
				'Offer' => array(
					0 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3419/12',
						'title' => 'MUMBAI Direct EXTRA SPECIAL',
						'price' => '485',
					),
					1 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3419/13',
						'title' => 'Fly DREAMLINER MUMBAI DELHI Direct Specials',
						'price' => '465',
					),
					2 => array(
						'id' => 'w[CDMKQW[PC,WQC',
						'ref' => '3419/14',
						'title' => 'MUMBAI DELHI Direct SUPER Special Offers',
						'price' => '475',
					),
				),
			),
		);
		// $options = array(
		// 	'conditions' => array(
		// 		'Offer.publish' => true,
		// 	)
		// );
		$this->Region->contain(array(
			'Offer' => array(
				'conditions' => array(
					'Offer.publish' => true,
					'Offer.date_end <=' => date('Y-m-d 00:00:00'),
				),
				'order' => array(
					'Offer.display_order' => 'ASC'
				),
				'limit' => 10
			),
		));
		$regions = $this->Region->find('all');
		// debug($regions);
		// die;
		$title_for_layout = __('Our Current Special Offers');
		$this->set(compact(array('title_for_layout', 'regions')));
	}
	
	function admin_index() {
		$this->Page->contain(array(
			'ChildPage',
		));
		$pages = $this->Page->find('all');
		$title_for_layout = __('CMS :: Pages');
		$this->set(compact(array('title_for_layout', 'pages')));
	}
	
	function admin_add() {
		if (!empty($this->request->data)) {
			if (isset($this->request->data['Page']['publish']) && $this->request->data['Page']['publish'] == 'on') {
				$this->request->data['Page']['publish'] = true;
			} else {
				$this->request->data['Page']['publish'] = false;
			}
			if (isset($this->request->data['Page']['display_in_nav']) && $this->request->data['Page']['display_in_nav'] == 'on') {
				$this->request->data['Page']['display_in_nav'] = true;
			} else {
				$this->request->data['Page']['display_in_nav'] = false;
			}
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('Page has been saved.'), 'flash_success');
				$this->redirect(array('action' => 'index', 'admin' => true));
			} else {
				$this->Session->setFlash(__('There was a problem saving the page.'), 'flash_failure');
			}
		}
		
		$title_for_layout = __('CMS :: Pages :: New');
		$this->set(compact(array('title_for_layout')));
	}
	
	function admin_edit() {
		if (empty($this->request->params['page'])) {
			$this->Session->setFlash(__('Invalid request'), 'flash_failure');
			$this->redirect($this->referer());
		}
		
		if (!empty($this->request->data)) {
			if (isset($this->request->data['Page']['publish']) && $this->request->data['Page']['publish'] == 'on') {
				$this->request->data['Page']['publish'] = true;
			} else {
				$this->request->data['Page']['publish'] = false;
			}
			if (isset($this->request->data['Page']['display_in_nav']) && $this->request->data['Page']['display_in_nav'] == 'on') {
				$this->request->data['Page']['display_in_nav'] = true;
			} else {
				$this->request->data['Page']['display_in_nav'] = false;
			}
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('Page has been saved.'), 'flash_success');
				$this->redirect(array('action' => 'index', 'admin' => true));
			} else {
				$this->Session->setFlash(__('There was a problem saving the page.'), 'flash_failure');
			}
		}
		$this->Page->contain();
		$this->request->data = $page = $this->Page->findById($this->request->params['page']);
		$title_for_layout = __('Edit Content Page - %s', $page['Page']['title']);
		
		$this->set(compact(array('title_for_layout', 'page')));
	}
	
	function admin_delete() {
		if (empty($this->request->params['page'])) {
			$this->Session->setFlash(__('Invalid request'), 'flash_failure');
			$this->redirect($this->referer());
		}
		
		if ($this->Page->delete($this->request->params['page'])) {
			$this->Session->setFlash(__('Page has been deleted successfully'), 'flash_success');
		} else {
			$this->Session->setFlash(__('Page Could not be deleted, please try again.'), 'flash_failure');
		}
		$this->redirect($this->referer());
	}
	
	function admin_dashboard() {
		$title_for_layout = __('Dashboard');
		$this->set(compact(array('title_for_layout')));
	}
}
