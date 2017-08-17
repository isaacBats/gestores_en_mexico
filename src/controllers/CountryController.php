<?php 

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;

/**
* Country Controller
* @author Isaac Batista
*/

class CountryController extends Controller
{
  
    private $contryRepo;

    public function __construct()
    {
        parent::__construct();
        $this->contryRepo = new ContryRepo();
    }

    public function index($req, $res)
    {
        $this->addBread(['label' => 'Lista de Países']);
        $countries = $this->contryRepo->all()->order(['name' => 'ASC']);

        return $this->renderView($res, 'Country.index', compact('countries'));
    }
}