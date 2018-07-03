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

class ContryRepo extends BaseRepository
{
	const ACTIVE = 1;
	const INACTIVE = 0;

	public function getModel ()
	{
		return 'Contry';
	}

	public function getContryByCode ($code)
	{
		return $this->mapper->where(['code' => $code])->first();
	}

	public function getName($id)
	{
		$contry = $this->mapper->where(['id' => $id])->first();
		return $contry->name;
	}

	public function saveConf(array $ids = array())
	{
		foreach ($this->all() as $key => $contry) {
			if (array_key_exists($contry->id, $ids)) {
				$contry->is_active = self::ACTIVE;
				$this->update($contry);
			} else {
				$contry->is_active = self::INACTIVE;
				$this->update($contry);
			}
		}
	}
}