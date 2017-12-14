<?php 

use Olive\controllers\Controller;
use Olive\infrastructure\ContryRepo;
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

    public function saveConf($req, $res)
    {
        unset($req->data['_RAW_HTTP_DATA']);
        $ids = $req->data;
        $this->contryRepo->saveConf($ids);
        $this->session->setFlash('alert', [
            'message' => 'Configuración guardada', 
            'status' => 'Exito:', 
            'class' => 'alert-info']
        );
        header('Location: /admin/paises');
    }
}