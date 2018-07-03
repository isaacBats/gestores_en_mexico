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

    /**
     * View login admin
     * @param  object $req
     * @param  object $res
     * @return Render view
     */
    public function login($req, $res) 
	{
        return $this->renderView($res, 'User.login');
    }

    /**
     * View Home admin
     * @param  object $req
     * @param  object $res
     * @return Render View
     */
    public function index ($req, $res)
    {
        return $this->renderView($res, 'User.index');
    }

    /**
     * Return home without login 
     * @param  object $req
     * @param  object $res
     * @return Redirect
     */
    public function logout($req, $res) 
    {
        header("Location: http://" . $_SERVER['HTTP_HOST']);
    }

    /**
     * View all Users 
     * @param  object $req
     * @param  object $res
     * @return Render View
     */
    public function showUsers ($req, $res)
    {
        $this->addBread(['label' => 'Lista de usuarios']);
        $users = $this->userRepo->all();
        return $this->renderView($res, 'User.listar', compact('users'));
    }

    /**
     * Create User view
     * @param  object $req
     * @param  object $res
     * @return View with form
     */
    public function create ($req, $res)
    {
        $this->addBread(['label' => 'Usuarios', 'url' => '/admin/usuarios']);
        $this->addBread(['label' => 'Crear usuario']);
        
        $form = self::form(new Olive\models\User);
        return $this->renderView($res, 'User.create', compact('form'));
    }

    /**
     * Save new user
     * @param  object $req
     *                 expected $req->data[] With information of the new user
     * @param  object $res
     * @return true if user saved
     */
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

    /**
     * View for user edit
     * @param  object $req
     *                 expected $req->data[] With information of the new user
     * @param  object $res
     * @return View with form and information of the user
     */
    public function edit($req, $res)
    {
        $this->addBread(['label' => 'Usuarios', 'url' => '/admin/usuarios']);
        $this->addBread(['label' => 'Editar usuario']);
        $user = $this->userRepo->get($req->params['id']);
        $form = self::form(new Olive\models\User, $user->toArray(), '', 'post', 'Actualizar');
        return $this->renderView($res, 'User.edit', compact('form'));
    }

    /**
     * Action Update information of the user
     * @param  object $req
     * @param  object $res
     * @return true if user updated
     */
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
        if (!empty($_FILES['image'])) {
            $path = 'assets/images/photos/';
            $image = saveImage($_FILES['image'], $path);
            $user->image = $image->path;
        }

        try {
            $this->userRepo->update($user);
            $this->session->setFlash('alert', ['message' => 'Usuario editado correctamente!', 'class' => 'alert-info']);
        } catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
        }
        header('Location: /admin/usuarios');
    }

    /**
     * Remove user of the database
     * @param  object $req
     * @param  object $res
     * @return true if user  removed with exito 
     */
    public function remove($req, $res)
    {
        $user = $this->userRepo->get($req->params['id']);
        try {
            $this->userRepo->delete($user);
            $this->session->setFlash('alert', ['message' => "Se ha borrado el usuario {$user->first_name} {$user->last_name} correctamente!", 'class' => 'alert-info']);
        } catch (Spot\Exception $e) {
            $this->session->setFlash("alert", ["message" => $e->getMessage(), "class" => "alert-warning"]);
        }
        header('Location: /admin/usuarios');
    }

    /**
     * View Profile of a user
     * @param  object $req
     * @param  object $res
     * @return Render View
     */
    public function profile($req, $res)
    {
        $session = $this->session_handle->getSegment('Olive\Session');
        $userProfile = $session->get("user");
        $user = $this->userRepo->get($userProfile->id);
        return $this->renderView($res, 'User.profile', compact('user'));
    }

    /**
     * Change status of Active or Inactive of the user
     * @param  object $req
     *                 expected $req->data['user'] this is the user ID 
     *                          $req->data['status']
     * @param  object $res
     * @return JSON response
     */
    public function changeStatus($req, $res)
    {
        $data = $req->data;
        $json = new stdClass();
        $user = $this->userRepo->get($data['user']);
        $user->is_active = $data['status'] == 'true' ? self::ACTIVO : self::INACTIVO;
        try {
            $this->userRepo->update($user);
            $json->exito = true;
            $json->message = 'Usuario ' . ($data['status'] == 'true' ? 'Activado' : 'Desactivado') . ' correctamente!';
        } catch (Spot\Exception $e) {
            $json->exito = false;
            $json->message = $e->getMessage();
        }
        $res->addHeader( "Content-Type", "application/json; charset=utf-8");
        $res->add(json_encode($json, JSON_UNESCAPED_UNICODE));
        echo $res->send();
    }

}