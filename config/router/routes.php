<?php
	
	$router->addRoute(array(
	  'path'     => '/',
	  'get'      => array('Plain', 'home')
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