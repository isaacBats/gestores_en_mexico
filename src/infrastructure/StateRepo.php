<?php

namespace Olive\infrastructure;
use Olive\models\State;

class StateRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'State';
	}

	
}