<?php 

use Olive\controllers\Controller;
use Olive\infrastructure\FormRepo;
use Olive\infrastructure\TransactionRepo;

/**
* Form Controller
* @author Isaac Batista
*/

class FormController extends Controller
{
  
    private $formRepo;
    private $transactionRepo;

    public function __construct()
    {
        parent::__construct();
        $this->formRepo = new FormRepo();
        $this->transactionRepo = new TransactionRepo();
    }

    public function index($req, $res)
    {
        $this->addBread(['label' => 'Lista de Formularios']);
        $transactions = $this->transactionRepo->all()->order(['name' => 'ASC']);

        return $this->renderView($res, 'Form.index', compact('transactions'));
    }

    public function edit($req, $res)
    {
        $this->addBread(['label' => 'Edicion de formulario']);
        
        
        return $this->renderView($res, 'Form.edit', compact('countries'));
    }

    public function update($req, $res)
    {
        unset($req->data['_RAW_HTTP_DATA']);
        $ids = $req->data;
        $this->formRepo->saveConf($ids);
        $this->session->setFlash('alert', [
            'message' => 'Configuración guardada', 
            'status' => 'Exito:', 
            'class' => 'alert-info']
        );
        header('Location: /admin/paises');
    }
}