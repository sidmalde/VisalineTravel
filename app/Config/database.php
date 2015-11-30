<?php

class DATABASE_CONFIG {
	
	// public $staging = array(
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'sidmalde_visaline',
	);

	public $live = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'sidmalde',
		'password' => 'F3rrari1',
		'database' => 'sidmalde_visaline',
		'prefix' => '',
	);
	
	function __construct(){
		/*if (strpos($_SERVER['HTTP_HOST'],'test.') !== false) {
			$this->default = $this->live;
		} else {
			$this->default = $this->default;
		}*/
		$this->default = $this->default;
	}
	
	function DATABASE_CONFIG(){
		$this->__construct();
	}
}
