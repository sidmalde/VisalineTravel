<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

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
		$title_for_layout = __('Ninth Galaxy :: Art Universe');
		$this->set(compact(array('title_for_layout')));
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
