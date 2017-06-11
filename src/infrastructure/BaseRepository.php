<?php 

namespace Olive\infrastructure;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

abstract class BaseRepository
{
	public $entity_name;

	/**
     * Entity error messages (may be present after save attempt)
     *
     * @var array
     */
    protected $_errors = [];

	abstract public function getModel();

	function __construct()
	{
		$this->entity_name = class_exists( "\\Olive\\models\\".$this->getModel())?("\\Olive\\models\\".$this->getModel()):"";
		
		global $spot;
		$this->spot = $spot;
		$this->mapper = ($this->entity_name != "")?$this->spot->mapper( $this->entity_name ):NULL;

		// create a log channel
		$this->log = new Logger('luna');
		$this->log->pushHandler(new StreamHandler(__DIR__.'/logs/orm_olive.log', Logger::INFO ) );
	}

	public function all ()
	{
		return $this->mapper->all();
	}

	public function where ($where = array(), $type = 'AND')
	{
		return $this->mapper->where($where, $type);
	}

	public function save (\Spot\Entity $entity)
	{
		$rs = $this->mapper->insert($entity);
		$this->_errors = array_merge($this->_errors, $entity->errors());
		if($rs)
			return $this->mapper->get($rs);
		else
			return false;
	}

	public function create (array $entity)
	{
		$rs = $this->mapper->create($entity);
		$this->_errors = array_merge($this->_errors, $rs->errors());
		if($rs)
			return $this->mapper->get($rs->id);
		else
			return false;
	}

	public function get ($key = null)
	{
		if(is_null($key))
			return $this->mapper->get();
		else 
			return $this->mapper->get($key);
	}

	public function getErrors()
	{
		return $this->_errors;
	}

	public function update ($entity)
	{
		return $this->mapper->update($entity);
	}

	public function delete ($entity)
	{
		return $this->mapper->delete($entity);
	}
}
