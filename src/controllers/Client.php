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
use Olive\infrastructure\StateRepo;
use Olive\infrastructure\SettlementRepo;
use Olive\infrastructure\TownshipRepo;

class Client extends Controller
{
	private $settlementRepo;
	private $townshipRepo;
	private $stateRepo;
	
	function __construct()
	{
		parent::__construct();
		$this->stateRepo = new StateRepo();
		$this->settlementRepo = new SettlementRepo();
		$this->townshipRepo = new TownshipRepo();
	}

	public function getMap(Olive\models\Client $client)
	{
		$row = array();
		$township = $this->townshipRepo->get($client->id_township);
		$settlement = $this->settlementRepo->get($client->id_settlement);
		$state = $this->stateRepo->get($client->id_state);
		$row['Nombre(s):'] = $client->first_name;
		$row['Apellido paterno:'] = $client->middle_name;
		$row['Apellido materno:'] = $client->last_name;
		$row['Email:'] = $client->email;
		$row['Telefono:'] = $client->telephone;
		$row['Celular:'] = $client->mobile;
		$row['Calle:'] = $client->address;
		$row['Número exterior:'] = $client->num_extern;
		$row['Número interior:'] = $client->num_inside;
		$row['Colonia:'] = $client->settlement;
		$row['Delegación/Municipio:'] = $client->township;
		$row['Estado:'] = $state->name;
		$row['C.P.:'] = $client->zip_code;
		$row['Referencia:'] = $client->reference;
		return $row;
	}
}