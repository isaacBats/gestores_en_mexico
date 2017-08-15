<?php
namespace Olive\infrastructure;

class UserRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'User';
	}
}