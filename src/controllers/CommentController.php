<?php 

use Olive\controllers\Controller;
use Olive\infrastructure\CommentRepo;

/**
* Comment Controller
*/

class CommentController extends Controller
{

	private $commentRepo;

	public function __construct()
	{
		parent::__construct();
		$this->commentRepo = new CommentRepo();
	}

	public function create($req, $res)
	{
		unset($req->data['_RAW_HTTP_DATA']);
		unset($req->data['files']);
		$data = $req->data;
		$data['id_user'] = $req->user->id;
		$data['type'] = $req->params['type'];
		
		$comment = $this->commentRepo->create($data);
        
        if ($comment->get('errors'))
            $this->session->setFlash("alert", ["message" => var_export($comment->get('errors')), "class" => "alert-warning"]);
        else
            $this->session->setFlash('alert', ['message' => 'Comentario creado!.', 'class' => 'alert-info']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
}