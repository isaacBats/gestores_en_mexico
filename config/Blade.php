<?php 
namespace config;

use Windwalker\Renderer\BladeRenderer;

class Blade extends \Zaphpa\BaseMiddleware
{
	// private $renderer;
	
	// private function render ($template, array $data) 
	// {
	// 	return $this->renderer->render($template, $data);
	// }

	function preroute(&$req, &$res) 
	{
		$paths = array(__OLIVE__.'/views');
		$renderer = new BladeRenderer($paths, array('cache_path' => __OLIVE__.'/tmp/cache/blade'));

		$renderer->addCustomCompiler('slug', function($string) {
			return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), 
	  			array('', '-', ''), $this->remove_accent($string)));
		});

		$res->blade = $renderer;
		// echo '<pre>'; print_r($res); exit;
		// $res->b = $renderer;
	}

	function prerender( &$buffer ) 
	{
		// all logic
	}
	
	
}