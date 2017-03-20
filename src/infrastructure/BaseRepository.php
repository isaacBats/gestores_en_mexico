<?php 

namespace Olive\infrastructure;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

abstract class BaseRepository
{
	public $entity_name;

	abstract public function getModel();

	function __construct()
	{
		$this->entity_name = class_exists( "\\Olive\\models\\".$this->getModel())?("\\Olive\\models\\".$this->getModel()):"";
		
		global $spot;
		$this->spot = $spot;
		$this->mapper = ($this->entity_name != "")?$this->spot->mapper( $this->entity_name ):NULL;

		// create a log channel
		$this->log = new Logger('luna');
		$this->log->pushHandler(new StreamHandler(__DIR__.'/logs/luna.log', Logger::INFO ) );
	}

	public function all ()
	{
		return $this->mapper->all();
	}
}
