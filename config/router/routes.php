<?php
	
	/* Front routes */
	$router->addRoute(array(
	  'path'     => '/',
	  'get'      => array('Plain', 'construction')
	));

	$router->addRoute(array(
	  'path'     => '/nosotros',
	  'get'      => array('Plain', 'nosotros')
	));

	$router->addRoute(array(
	  'path'     => '/como-funciona',
	  'get'      => array('Plain', 'comoFunciona')
	));

	$router->addRoute(array(
	  'path'     => '/contacto',
	  'get'      => array('Plain', 'contacto')
	));

	$router->addRoute(array(
	  'path'     => '/aviso-privacidad',
	  'get'      => array('Plain', 'aviso')
	));

	$router->addRoute(array(
	  'path'     => '/preguntas-frecuentes',
	  'get'      => array('Plain', 'preguntas')
	));

	$router->addRoute(array(
	  'path'     => '/gracias',
	  'get'      => array('Plain', 'gracias')
	));

	$router->addRoute(array(
	  'path'     => '/test-email',
	  'get'      => array('Plain', 'test')
	));

	$router->addRoute(array(
	  'path'     => '/tramites/{code_contry}/{slug}',
	  'get'      => array('Transaction', 'showFormTransaction'),
	  'post'	 => array('Transaction', 'saveTrancaction'),
	));

	$router->addRoute(array(
	  'path'     => '/serv/obtener-precio',
	  'get'      => array('PriceController', 'getPrice'),
	));

	/* Admin routes*/

	$router->addRoute(array(
		'path'	=> '/admin/index',
		'get'	=> array('User', 'index'),
	));