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