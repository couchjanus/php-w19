<?php
/**
 * UserController.php
 * Контроллер для управления users
 */
require_once CORE.'/Controller.php';
require_once MODELS.'/User.php';
require_once MODELS.'/Role.php';

class UserController extends Controller
{
    private $costs = [
        'cost' => 12,
    ];

    /**
     * Главная страница управления users
     *
     * @return bool
     */
    public function index()
    {
        $users = (new User)->all();
        $title = 'User List Page';
        $this->view->render('admin/users/index', compact('users', 'title'), 'admin');
    }

    /**
     * Добавление user
     *
     * @return bool
     */

    public function create()
    {
        $title = 'Create User';
        $roles = (new Role)->all();
        $this->view->render('admin/users/create', compact('title', 'roles'), 'admin');
    }
// 
    public function store()
    {
        $hash = password_hash($this->request->data['password'], PASSWORD_BCRYPT, $this->costs);
        (new User())->save(["name"=>$this->request->data['name'], 'password'=>$hash,'email'=>$this->request->data['email'], 'role_id'=>$this->request->data['role_id']]);
        header('Location: /admin/users');
    }

    public function edit($vars)
    {
        extract($vars);
        $user = (new User())->getByPK($id);
        $roles = (new Role)->all();
        $title = 'Edit User';
        $this->view->render('admin/users/edit', compact('title', 'user', 'roles'), 'admin');
    }

    public function update()
    {
        $hash = password_hash($this->request->data['password'], PASSWORD_BCRYPT, $this->costs);
        $status = $this->request->data['status'] ? 1:0;
        (new User())->update($this->request->data['id'], ["name"=>$this->request->data['name'], 'password'=>$hash,'email'=>$this->request->data['email'], 'role_id'=>$this->request->data['role_id'], 'status'=>$status]);
        header('Location: /admin/users');
    }

    public function delete($vars)
    {
        extract($vars);
        $title = 'Delete User';
        $user = (new User())->getByPK($id);
        $this->view->render('admin/users/delete', compact('title', 'user'), 'admin');
    }
    public function destroy()
    {
        if (isset($this->request->data['submit'])) {
            (new User())::destroy($this->request->data['id']);
            header('Location: /admin/users');
        } else {
            header('Location: /admin/users');
        }
    }  
}