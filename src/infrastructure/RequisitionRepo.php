<?php

namespace Olive\infrastructure;

class RequisitionRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'Requisition';
	}

	public function listRequisitions ()
	{
		return $this->mapper->all();
	}
	
}