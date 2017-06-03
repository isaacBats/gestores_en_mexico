<?php

namespace Olive\infrastructure;
use Olive\models\State;

class StateRepo extends BaseRepository
{
	private $contryRepo;
	
	function __construct() 
	{
		parent::__construct();
		$this->contryRepo = new ContryRepo();
	}
	public function getModel ()
	{
		return 'State';
	}

	public function getStatesByContry ($code)
	{
		$contry = $this->contryRepo->getContryByCode ($code);
		return $this->mapper->where(['id_contry' => $contry->id]);
	}

	public function getStateByCode($code)
	{
		return $this->mapper->query("SELECT * FROM states WHERE code LIKE '%{$code}%'")->first();
	}

	public function getName($id)
	{
		$state = $this->mapper->where(['id' => $id])->first();
		return $state->name;
	}
}