<?php

use Olive\controllers\Controller;
use Olive\infrastructure\PriceRepo;

class PriceController extends Controller
{
	private $priceRepo;

	function __construct ()
	{
		parent::__construct ();
		$this->priceRepo = new PriceRepo();
	}

	public function getPrice ($req, $res)
	{
		$price = $this->priceRepo->getPrice($req->data['state'], $req->data['transaction']);
		$res->addHeader( "Content-Type ", "application/json; charset=utf-8");
        $res->add(json_encode( $price , JSON_UNESCAPED_UNICODE) );
        echo $res->send();

	}


}