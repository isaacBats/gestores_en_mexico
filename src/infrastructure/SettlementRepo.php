<?php

namespace Olive\infrastructure;

class SettlementRepo extends BaseRepository
{
	
	public function getModel ()
	{
		return 'Settlement';
	}
	
	public function getSettlementByZipCode ($zipCode)
	{
		return $this->mapper->where(['zipcode' => $zipCode])->first();
	}
}