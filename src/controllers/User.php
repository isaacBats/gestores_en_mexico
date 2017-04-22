<?php 

use Olive\controllers\Controller;
use Olive\infrastructure\UserRepo;

class User extends Controller
{
	private $userRepo;

    function __construct()
    {
        parent::__construct();
        $this->userRepo = new UserRepo();
    }

    public function login($req, $res) 
	{
        return $this->renderView($res, 'User.login');
    }

    public function index ($req, $res)
    {
        $bread = $this->bread();
        return $this->renderView($res, 'User.index', compact('bread'));
    }

    public function logout($req, $res) 
    {
        header("Location: http://" . $_SERVER['HTTP_HOST']);
    }

    public function showUsers ($req, $res)
    {
        $this->addBread(['label' => 'Lista de usuarios']);
        $bread = $this->bread();
        $users = $this->userRepo->all();

        return $this->renderView($res, 'User.listar', compact('bread', 'users'));
    }

    public function create ($req, $res)
    {
        $this->addBread(['label' => 'Crear usuario']);
        $bread = $this->bread();
        return $this->renderView($res, 'User.create', compact('bread'));
    }

}