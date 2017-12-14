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
        $transaction = $this->transactionRepo->get($req->params['formid']);
        
        return $this->renderView($res, 'Form.edit', compact('transaction'));
    }

    public function update($req, $res)
    {
        unset($req->data['_RAW_HTTP_DATA']);
        
        $id = $req->params['formid'];
        $form = $this->formRepo->get($id);
        $form->title = $req->data['title'];
        $form->description = $req->data['description'];
        $this->formRepo->update($form);
        $this->session->setFlash('alert', [
            'message' => "El formulario: {$form->name} se ha actualizado satisfactoriamente!." , 
            'status' => 'Exito:', 
            'class' => 'alert-info']
        );
        header('Location: /admin/formularios');
    }
}