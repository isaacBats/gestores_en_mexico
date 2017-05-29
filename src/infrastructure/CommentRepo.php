<?php

namespace Olive\infrastructure;

class CommentRepo extends BaseRepository
{
	public function getModel ()
	{
		return 'Comment';
	}
	
}