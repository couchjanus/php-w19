<?php
/**
 * RoleController.php
 * Контроллер для управления roles
 */
require_once CORE.'/Request.php';
require_once CORE.'/Controller.php';
require_once MODELS.'/Role.php';


class RoleController extends Controller
{
    /**
     * Главная страница управления roles
     *
     * @return bool
     */
    public function index()
    {
        $roles = (new Role)->all();
        $title = 'Roles List Page ';
        $this->view->render('admin/roles/index', compact('title', 'roles'), 'admin');
        
    }

    /**
     * Добавление role
     *
     * @return bool
     */
    public function create()
    {
        $title = 'Add New Role';
        $this->view->render('admin/roles/create', compact('title'), 'admin');
    }

    public function store()
    {
        $request = new Request();
        (new Role())->save(["name"=>$this->request->data['name']]);
        header('Location: /admin/roles');
    }

    public function edit($vars)
    {
        extract($vars);
        $role = (new Role())->getByPK($id);
        $title = 'Edit Role';
        $this->view->render('admin/roles/edit', compact('title', 'role'), 'admin');
    }

    public function update()
    {
        (new Role())->update($this->request->data['id'], ["name"=>$this->request->data['name']]);
        header('Location: /admin/roles');
    }

    public function delete($vars)
    {
        extract($vars);
        $title = 'Delete Role ';
        $role = (new Role())->getByPK($id);
        $this->view->render('admin/roles/delete', compact('title', 'role'), 'admin');
    }

    public function destroy()
    {
        if (isset($this->request->data['submit'])) {
            (new Role())->destroy($this->request->data['id']);
            header('Location: /admin/roles');
        } else {
            header('Location: /admin/roles');
        }
    }  
   
}