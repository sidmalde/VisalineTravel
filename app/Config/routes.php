<?php

	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/search', array('controller' => 'pages', 'action' => 'search'));
	
	// Groups
	Router::connect('/system-management/groups', array('controller' => 'groups', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/groups/new', array('controller' => 'groups', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/groups/:group', array('controller' => 'groups', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/groups/:group/edit', array('controller' => 'groups', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/groups/:group/delete', array('controller' => 'groups', 'action' => 'delete', 'admin' => true));
	
	// Users
	Router::connect('/system-management/users', array('controller' => 'users', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/users/new', array('controller' => 'users', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/users/:user', array('controller' => 'users', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/users/:user/edit', array('controller' => 'users', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/users/:user/delete', array('controller' => 'users', 'action' => 'delete', 'admin' => true));
	
	// Pages
	Router::connect('/content-management/pages', array('controller' => 'pages', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/pages/new', array('controller' => 'pages', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/pages/:page', array('controller' => 'pages', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/pages/:page/edit', array('controller' => 'pages', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/pages/:page/delete', array('controller' => 'pages', 'action' => 'delete', 'admin' => true));
	Router::connect('/system-management/dashboard', array('controller' => 'pages', 'action' => 'dashboard', 'admin' => true));
	
	// Forums
	Router::connect('/content-management/forums', array('controller' => 'forums', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/forums/new', array('controller' => 'forums', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/forums/:forum', array('controller' => 'forums', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/forums/:forum/edit', array('controller' => 'forums', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/forums/:forum/delete', array('controller' => 'forums', 'action' => 'delete', 'admin' => true));
	
	Router::connect('/*', array('controller' => 'pages', 'action' => 'view'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';