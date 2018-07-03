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