<?php

use Olive\controllers\Controller;
use Olive\infrastructure\PriceRepo;
use Olive\infrastructure\ContryRepo;
use Olive\infrastructure\StateRepo;

class PriceController extends Controller
{
	private $priceRepo;
	private $contryRepo;
	private $stateRepo;

	function __construct ()
	{
		parent::__construct ();
		$this->priceRepo = new PriceRepo();
		$this->contryRepo = new ContryRepo();
		$this->stateRepo = new StateRepo();
	}

	public function getPrice ($req, $res)
	{
		$price = $this->priceRepo->getPrice($req->data['state'], $req->data['transaction']);
		$res->addHeader( "Content-Type", "application/json; charset=utf-8");
        $res->add(json_encode( $price , JSON_UNESCAPED_UNICODE) );
        echo $res->send();

	}

	public function index ($req, $res)
	{
		$this->addBread(['label' => 'Lista de precios']);
		$prices = $this->priceRepo->getPricesWithStates();
		$contries = array();
		$states = array();
		foreach ($prices as $price) {
			$contry = $this->contryRepo->get($price->state->id_contry);
			$price->state->slug = $this->url_slug(utf8_encode($price->state->name));
			$price->state->code_slug = $this->url_slug($price->state->code);
			if (!in_array($contry, $contries))
				$contries[utf8_encode($contry->name)] = $contry;

			if(!in_array($price->state, $states))
				$states[utf8_encode($price->state->name)] = $price->state;
		}

		return $this->renderView($res, 'Price.index', compact('prices', 'contries', 'states'));
	}

	public function priceState ($req, $res)
	{
		$state = $this->stateRepo->getStateByCode($req->params['code']);
		$state->code = $this->url_slug($state->code);

		$this->addBread(['url' => '/admin/precios', 'label' => 'Lista de precios']);
		$this->addBread(['label' => utf8_encode($state->name)]);

		$prices = $this->priceRepo->pricesOfState($state);

		return $this->renderView($res, 'Price.state', compact('state','prices'));
	}

	public function priceEdit ($req, $res)
	{
		$state = $this->stateRepo->getStateByCode($req->params['code']);
		$state->code = $this->url_slug($state->code);
		$price = $this->priceRepo->get($req->params['id']);

		$this->addBread(['url' => '/admin/precios', 'label' => 'Lista de precios']);
		$this->addBread(['url' => "/admin/precios/".$state->code."/".$this->url_slug(utf8_encode($state->name)), 'label' => utf8_encode($state->name)]);
		$this->addBread(['label' => utf8_encode($price->transaction->name)]);

		return $this->renderView($res, 'Price.edit', compact('state','price'));
	}
}