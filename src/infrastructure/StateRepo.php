<?php
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
		return utf8_encode($state->name);
	}
}