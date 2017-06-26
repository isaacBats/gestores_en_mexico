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

		/* Usuarios */
			$router->addRoute(array(
				'path'	=> '/admin/usuarios',
				'get'	=> array('User', 'showUsers'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/usuario/crear',
				'get'	=> array('User', 'create'),
				'post'	=> array('User', 'store'),
			));

		/* Admin Tramites */
			$router->addRoute(array(
				'path'	=> '/admin/tramites',
				'get'	=> array('RequisitionController', 'showRequisitions'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/tramites/enviar-correo-status-ok',
				'get'	=> array('RequisitionController', 'sendMail'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/tramites/{id}',
				'get'	=> array('RequisitionController', 'detailRequisition'),
				'post'	=> array('RequisitionController', 'update'),
			));

	
 		/* Admin Comentarios */
			$router->addRoute(array(
				'path'	=> '/comment/{type}/add',
				'post'	=> array('CommentController', 'create'),
			));

		/* Admin Precios */
			$router->addRoute(array(
				'path'	=> '/admin/precios',
				'get'	=> array('PriceController', 'index'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/precios/editar/{code}/{id}',
				'get'	=> array('PriceController', 'priceEdit'),
				'post'	=> array('PriceController', 'priceUpdate'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/precios/{code}/{state}',
				'get'	=> array('PriceController', 'priceState'),
			));

		/* Admin Atributos */
			$router->addRoute(array(
				'path'	=> '/admin/atributos',
				'get'	=> array('AttributesController', 'index'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/atributo/{id}',
				'get'	=> array('AttributesController', 'edit'),
				'post'	=> array('AttributesController', 'update'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/atributo/borrar/{id}',
				'post'	=> array('AttributesController', 'delete'),
			));