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