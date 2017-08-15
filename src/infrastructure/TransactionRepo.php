<?php

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