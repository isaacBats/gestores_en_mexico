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
        
        if ($user->get('errors'))
            $this->session->setFlash("alert", ["message" => var_export($user->get('errors')), "class" => "alert-warning"]);
        else
            $this->session->setFlash('alert', ['message' => 'Usuario creado correctamente!', 'class' => 'alert-info']);

        header('Location: /admin/usuarios');
    }

    public function edit($req, $res)
    {
        $this->addBread(['label' => 'Usuarios', 'url' => '/admin/usuarios']);
        $this->addBread(['label' => 'Editar usuario']);
        $user = $this->userRepo->get($req->params['id']);
        $form = self::form(new Olive\models\User, $user->toArray(), '', 'post', 'Actualizar');
        return $this->renderView($res, 'User.edit', compact('form'));
    }

    public function update($req, $res)
    {
        $userID = $req->params['id'];
        $data = $req->data;
        
        $user = $this->userRepo->get($userID);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->user_name = $data['user_name'];
        $user->type_user = $data['type_user'];
        try {
            $this->userRepo->update($user);
            $this->session->setFlash('alert', ['message' => 'Usuario editado correctamente!', 'class' => 'alert-info']);
        } catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
        }
        header('Location: /admin/usuarios');
    }

    public function remove($req, $res)
    {

    }

}