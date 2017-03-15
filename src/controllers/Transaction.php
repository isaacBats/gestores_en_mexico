<?php

use Olive\controllers\Controller;

class Transaction extends Controller
{
	public function show($req, $res)
	{
		$template = 'Transaction.' . strtolower($req->params['code_contry']) . '_' . str_replace('-', '_', $req->params['slug']);
		
		return $this->renderView($res, $template);
	}
}