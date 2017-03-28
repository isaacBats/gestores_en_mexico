<?php

namespace Olive\infrastructure;

class PriceRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'Price';
	}

	public function getPrice ($stateORid, $transaction = null)
	{
		if(is_null($transaction))
			return $this->mapper->where(['id' => $stateORid])->first();
		else
			return $this->mapper->where(['id_state' => $stateORid, 'id_transaction' => $transaction])->first();
	}

	
}