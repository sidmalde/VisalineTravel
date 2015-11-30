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
	Router::connect('/dashboard', array('controller' => 'users', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/users', array('controller' => 'users', 'action' => 'index', 'admin' => true));
	Router::connect('/system-management/users/new', array('controller' => 'users', 'action' => 'add', 'admin' => true));
	Router::connect('/system-management/users/:user', array('controller' => 'users', 'action' => 'view', 'admin' => true));
	Router::connect('/system-management/users/:user/edit', array('controller' => 'users', 'action' => 'edit', 'admin' => true));
	Router::connect('/system-management/users/:user/delete', array('controller' => 'users', 'action' => 'delete', 'admin' => true));
	
	// Pages
	Router::connect('/system-management/dashboard', array('controller' => 'pages', 'action' => 'dashboard', 'admin' => true));
	Router::connect('/content-management/pages', array('controller' => 'pages', 'action' => 'index', 'admin' => true));
	Router::connect('/content-management/pages/new', array('controller' => 'pages', 'action' => 'add', 'admin' => true));
	Router::connect('/content-management/pages/:page', array('controller' => 'pages', 'action' => 'view', 'admin' => true));
	Router::connect('/content-management/pages/:page/edit', array('controller' => 'pages', 'action' => 'edit', 'admin' => true));
	Router::connect('/content-management/pages/:page/delete', array('controller' => 'pages', 'action' => 'delete', 'admin' => true));
	
	// Offers
	Router::connect('/offer-management/regions', array('controller' => 'regions', 'action' => 'index', 'admin' => true));
	Router::connect('/offer-management/regions/new', array('controller' => 'regions', 'action' => 'add', 'admin' => true));
	// Router::connect('/offer-management/regions/:offer', array('controller' => 'regions', 'action' => 'view', 'admin' => true));
	Router::connect('/offer-management/regions/:region/edit', array('controller' => 'regions', 'action' => 'edit', 'admin' => true));
	Router::connect('/offer-management/regions/:region/delete', array('controller' => 'regions', 'action' => 'delete', 'admin' => true));
	
	// Offers
	Router::connect('/offer-management/offers', array('controller' => 'offers', 'action' => 'index', 'admin' => true));
	Router::connect('/offer-management/offers/new', array('controller' => 'offers', 'action' => 'add', 'admin' => true));
	Router::connect('/offer-management/offers/migrate', array('controller' => 'offers', 'action' => 'migrate', 'admin' => true));
	Router::connect('/offer-management/offers/init', array('controller' => 'offers', 'action' => 'init_mass', 'admin' => true));
	Router::connect('/offer-management/offers/:offer', array('controller' => 'offers', 'action' => 'view', 'admin' => true));
	Router::connect('/offer-management/offers/:offer/edit', array('controller' => 'offers', 'action' => 'edit', 'admin' => true));
	Router::connect('/offer-management/offers/:offer/move-up', array('controller' => 'offers', 'action' => 'move_up', 'admin' => true));
	Router::connect('/offer-management/offers/:offer/move-down', array('controller' => 'offers', 'action' => 'move_down', 'admin' => true));
	Router::connect('/offer-management/offers/:offer/delete', array('controller' => 'offers', 'action' => 'delete', 'admin' => true));
	Router::connect('/offer-management/offers/:offer/restore', array('controller' => 'offers', 'action' => 'restore_offer', 'admin' => true));
	
	Router::connect('/*', array('controller' => 'pages', 'action' => 'view'));
	
	CakePlugin::routes();
	
	require CAKE . 'Config' . DS . 'routes.php';
