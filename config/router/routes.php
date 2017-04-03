<?php
	
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

	/**
	 * Upload for images
	 */
	// $router->addRoute(array(
	//   'path'     => '/image/upload',
	//   'get'      => array('Image', 'upload'),
	//   'post'      => array('Image', 'upload'),
	// ));


	// /**
	//  * Country API
	//  */
	// $router->addRoute(array(
	//   'path'     => '/country/{id}',
	//   'get'      => array('Country', 'getAction'),
	//   'post'      => array('Country', 'editAction'),		//TERMINADA
	//   'delete'      => array('Country', 'deleteAction')		//TERMINADA
	// ));
	// $router->addRoute(array(
	//   'path'     => '/countries',
	//   'post'      => array('Country', 'addAction'), 		// TERMINADA
	//   'get'      => array('Country', 'allAction')			//TERMINADA
	// ));


	// /**
	//  * Continents API
	//  */
	// $router->addRoute(array(
	//   'path'     => '/continents',
	//   'post'      => array('Continent', 'addAction'), 		//TERMINADA		
	//   'get'      => array('Continent', 'allAction')			//TERMINADA
	// ));