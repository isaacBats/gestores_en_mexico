<?php
	
	/* Front routes */
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
		  'path'     => '/listado',
		  'get'      => array('Plain', 'listado')
		));

		$router->addRoute(array(
		  'path'     => '/formulario-internacional',
		  'get'      => array('Plain', 'internacional')
		));

		$router->addRoute(array(
		  'path'     => '/contacto',
		  'get'      => array('Plain', 'contacto'),
		  'post'		 => array('Plain', 'sendFormContact')
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
		  'path'     => '/tramite/consulta/status',
		  'get'      => array('Plain', 'statusPublico')
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

			$router->addRoute(array(
				'path'	=> '/admin/usuario/editar/{id}',
				'get'	=> array('User', 'edit'),
				'post'	=> array('User', 'update'),
			));
			
			$router->addRoute(array(
				'path'	=> '/admin/usuario/borrar/{id}',
				'post'	=> array('User', 'remove'),
			));
			
			$router->addRoute(array(
				'path'	=> '/admin/usuario/perfil',
				'get'	=> array('User', 'profile'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/usuario/cambiar-status',
				'post'	=> array('User', 'changeStatus'),
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

			$router->addRoute(array(
				'path'	=> '/admin/tramite/remover/{id}',
				'post'	=> array('RequisitionController', 'delete'),
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

			$router->addRoute(array(
				'path'	=> '/admin/precios/{code}/{state}/delete/{id}',
				'post'	=> array('PriceController', 'priceDelete'),
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

		/* Admin Contries*/
			$router->addRoute(array(
				'path'	=> '/admin/paises',
				'get'	=> array('CountryController', 'index'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/paises/guardar-configuracion',
				'post'	=> array('CountryController', 'saveConf'),
			));

		/* Admin CMS Forms */
			$router->addRoute(array(
				'path'	=> '/admin/formularios',
				'get'	=> array('FormController', 'index'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/formulario/{formid}',
				'get'	=> array('FormController', 'edit'),
				'post'	=> array('FormController', 'update'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/static/header',
				'get'	=> array('Plain', 'infoHeader'),
				'post'	=> array('Plain', 'updateHeader'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/static/footer',
				'get'	=> array('Plain', 'infoFooter'),
			));

			$router->addRoute(array(
				'path'	=> '/admin/static/cuentas',
				'get'	=> array('Plain', 'infoAccounts'),
				'post'	=> array('Plain', 'updateAccounts'),
			));
