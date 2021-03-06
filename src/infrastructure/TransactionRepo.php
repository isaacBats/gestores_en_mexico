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

class TransactionRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'Transaction';
	}

	public function findBySlug ($slug)
	{
		return $this->mapper->where(['slug' => $slug])->first();
	}
	
}