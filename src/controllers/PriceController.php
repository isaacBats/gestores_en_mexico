<?php
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
			$price->state->slug = $this->url_slug($price->state->name);
			$price->state->code_slug = $this->url_slug($price->state->code);
			if (!in_array($contry, $contries))
				$contries[$contry->name] = $contry;

			if(!in_array($price->state, $states))
				$states[$price->state->name] = $price->state;
		}

		return $this->renderView($res, 'Price.index', compact('prices', 'contries', 'states'));
	}

	public function priceState ($req, $res)
	{
		$state = $this->stateRepo->getStateByCode($req->params['code']);
		$state->code = $this->url_slug($state->code);
		$paramStateName = $req->params['state'];

		$this->addBread(['url' => '/admin/precios', 'label' => 'Lista de precios']);
		$this->addBread(['label' => $state->name]);

		$prices = $this->priceRepo->pricesOfState($state);

		return $this->renderView($res, 'Price.state', compact('state','prices', 'paramStateName'));
	}

	public function priceEdit ($req, $res)
	{
		$state = $this->stateRepo->getStateByCode($req->params['code']);
		$state->code = $this->url_slug($state->code);
		$price = $this->priceRepo->get($req->params['id']);

		$this->addBread(['url' => '/admin/precios', 'label' => 'Lista de precios']);
		$this->addBread(['url' => "/admin/precios/".$state->code."/".$this->url_slug($state->name), 'label' => $state->name]);
		$this->addBread(['label' => $price->transaction->name]);

		return $this->renderView($res, 'Price.edit', compact('state','price'));
	}

	public function priceUpdate ($req, $res)
	{
		$data = $req->data;
		$price = $this->priceRepo->get($req->params['id']);
		$price->cost = $data['cost'];
		$price->copy_cost = isset($data['copy_cost']) ? $data['copy_cost'] : $price->copy_cost;
		$price->copy_send = isset($data['copy_send']) ? $data['copy_send'] : $price->copy_send;
		$price->delivery_min = $data['delivery_min'];
		$price->delivery_max = $data['delivery_max'];

		try {
			$this->priceRepo->update($price);
			$this->session->setFlash('alert', ['message' => 'Se ha actualizado el precio correcamente!', 'class' => 'alert-info']);
		} catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
		}
        header('Location: /admin/precios');
	}

	public function priceDelete($req, $res)
	{
		$price = $this->priceRepo->get($req->params['id']);
		$codeState = $req->params['code'];
		$state = $req->params['state'];
		try {
			$this->priceRepo->delete($price);
			$this->session->setFlash('alert', ['message' => "Se ha borrado el precio para {$price->transaction->name} de {$price->state->name} correctamente!", 'class' => 'alert-info']);
		} catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
		}
        $url = "/admin/precios/{$codeState}/{$state}";
        header("Location: " . $url);
	}
}