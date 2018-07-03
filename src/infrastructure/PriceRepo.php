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

	public function getPricesWithStates()
	{
		return $this->mapper->all()->with('state');
	}

	public function pricesOfState ($state)
	{
		return $this->mapper->where(['id_state' => $state->id]);
	}
}