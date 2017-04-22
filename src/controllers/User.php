<?php 

use Olive\controllers\Controller;
use Olive\infrastructure\UserRepo;

class User extends Controller
{
	private $userRepo;
    const ACTIVO = 1;
    const INACTIVO = 0;

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
        return $this->renderView($res, 'User.index');
    }

    public function logout($req, $res) 
    {
        header("Location: http://" . $_SERVER['HTTP_HOST']);
    }

    public function showUsers ($req, $res)
    {
        $this->addBread(['label' => 'Lista de usuarios']);
        $users = $this->userRepo->all();
        return $this->renderView($res, 'User.listar', compact('users'));
    }

    public function create ($req, $res)
    {
        $this->addBread(['label' => 'Usuarios', 'url' => '/admin/usuarios']);
        $this->addBread(['label' => 'Crear usuario']);
        
        $form = self::form(new Olive\models\User);
        return $this->renderView($res, 'User.create', compact('form'));
    }

    public function store($req, $res)
    {
        $data = $req->data;
        unset($data['_RAW_HTTP_DATA']);
        $data['is_active'] = self::ACTIVO;
        $user = $this->userRepo->create($data);
        self::vdd($user);

    }

}