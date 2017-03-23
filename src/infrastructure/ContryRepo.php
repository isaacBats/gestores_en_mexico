<?php

namespace Olive\infrastructure;

class ContryRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'Contry';
	}

	public function getContryByCode ($code)
	{
		return $this->mapper->where(['code' => $code])->first();
	}

	
}