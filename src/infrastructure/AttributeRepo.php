<?php

namespace Olive\infrastructure;

class AttributeRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'Attribute';
	}

	public function findByName ($name)
	{
		return $this->mapper->first(['attribute' => $name]);
	}
}