<?php 

use Olive\controllers\Controller;

class User extends Controller
{
	public function login($req, $res) 
	{
        return $this->renderView($res, 'User.login');
    }

    public function index ($req, $res)
    {
    	// exit('Hola, te has identificado');
        return $this->renderView($res, 'User.listar');
    }

    public function logout($req, $res) {
        header("Location: http://" . $_SERVER['HTTP_HOST']);
    }

}