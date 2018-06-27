<?php 
	
	include __DIR__ . "/mail.config.php";

	//  ROOT DIRECTORY
	define('__OLIVE__',  __DIR__."/.." );
	define('__ASSETS__',  __DIR__."/../assets/" );
	define('ENVIROMENT', 'dev');
	
	if (ENVIROMENT != 'prod') {
		// // TRACER
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
	}


	$cfg = new \Spot\Config();
	$cfg->addConnection('mysql', [
	    'dbname' => 'gestores',
	    'user' => 'gestores',
	    'password' => 'gestores',
	    'host' => 'localhost',
	    'driver' => 'pdo_mysql',
	]);

	global $spot;
	$spot = new \Spot\Locator($cfg);

	if( !isset($_SESSION)){session_start();}
	$aura_session = new \Aura\Session\SessionFactory;
	global $session_handle;
    $session_handle = $aura_session->newInstance($_SESSION);