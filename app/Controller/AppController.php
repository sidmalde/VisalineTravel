<?php
App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');

class AppController extends Controller {
	public $components = array(
		'Security' => array(
			'setHash' => 'md5',
			'validatePost' => false,
			'csrfCheck' => false,
		),
		'Acl',
		'Auth' => array(
			'authorize' => array(
				'Actions' => array('actionPath' => 'controllers')
			),
			'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => null),
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email'),
				),
			),
			'userScope' => array(
				'User.active' => true,
				'User.deleted' => false,
			),
			'autoRedirect' => false,
		),
		'Session',
		'Email',
		/* 'DebugKit.Toolbar', */
	);
	public $helpers = array('Html', 'Form', 'Session', 'Number', 'Time', 'Text');
	
	public $userGenders = array(
		'Male' => 'Male',
		'Female' => 'Female',
	);
	
	public $userTitles = array(
		'Mr' => 'Mr',
		'Mrs' => 'Mrs',
		'Miss' => 'Miss',
		'Dr' => 'Dr',
	);
	
	public $allowedUploadExtensions = array(
		'doc' => 'doc',
		'docx' => 'docx',
		'xls' => 'xls',
		'xlsx' => 'xlsx',
		'pdf' => 'pdf',
		'jpg' => 'jpg',
		'jpeg' => 'jpeg',
		'gif' => 'gif',
		'png' => 'png',
		'tiff' => 'tiff',
	);
	
	function beforeFilter() {
		//Configure SecurityComponent
		// Security::setHash('md5');
		
		if ($this->Auth->user()) {
			$this->currentUser = $this->Auth->user();
			$this->set('currentUser', $this->currentUser);
		}
		
		$this->setNav();
		
		$this->set('userGenders', $this->userGenders);
		$this->set('userTitles', $this->userTitles);
	}
	
	function setNav() {
		$this->loadModel('Page');
		$this->Page->contain('ChildPage');
		$options = array(
			'conditions' => array(
				'Page.parent_page_id' => null,
				'Page.publish' => true,
				'Page.display_in_nav' => true,
				'Page.url !=' => '/',
			),
		);
		$pages = $this->Page->find('all', $options);
		$this->pagesInNav = $pages;
		$this->set('pagesInNav', $pages);
	}

	function generateRandomString($type = 'username', $length = 10) {
		if ($type == 'username') {
			$string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		} elseif ($type == 'password') {
			$string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ[]()!@^,~|=-+_{}#";
		} elseif ($type == 'verificationCode') {
			$string = "0123456789abcdefghijklmnopqrstuvwxyz";
		} else {
			$string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}
		return substr(str_shuffle($string), 0, $length);
	}
}