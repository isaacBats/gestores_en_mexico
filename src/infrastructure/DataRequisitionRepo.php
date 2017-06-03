<?php

namespace Olive\infrastructure;

class DataRequisitionRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'DataRequisition';
	}
	
	public function get_attributes_of_requisition($requisition_id)
	{
		return $this->mapper->where(['id_requisition' => $requisition_id]);
	}
}