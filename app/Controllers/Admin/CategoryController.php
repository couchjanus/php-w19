<?php
// CategoryController.php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Category.php';

class CategoryController extends Controller
{
    public function index()
    {
         $title = 'Categories List';
         $categories = (new Category())->all();
         $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
    }

    public function create()
    {
         $title = 'Add New Category';
         $this->view->render('admin/categories/create', compact('title'), 'admin');
    }

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;
        (new Category())->save($this->request->data['name'], $status);
        $this->redirector->redirect("/admin/categories");
    }

    public function show($vars)
    {
        extract($vars);
        $title = 'Category Detail';
        // var_dump($id);
        // $id = 1;
        $category = (new Category())->getByPK($id);
        // var_dump($category);
        $this->view->render('admin/categories/show', compact('title', 'category'), 'admin');
    }

    public function edit($vars)
    {
        $title = 'Edit Category';
        extract($vars);
        $category = (new Category())->getByPK($id);
        $this->view->render('admin/categories/edit', compact('title', 'category'), 'admin');
    }

    public function update()
    {
        $status = $this->request->data['status'] ? 1:0;
        (new Category())->update($this->request->data['id'], $this->request->data['name'], $status);
        $this->redirector->redirect("/admin/categories");
    }

    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            (new Category())->destroy($id);
            header('Location: /admin/categories');
        } elseif (isset($_POST['reset'])) {
            header('Location: /admin/categories');
        }
        $title = 'Delete Category ';
        $category = (new Category())->getByPK($id);
        $this->view->render('admin/categories/delete', compact('title', 'category'), 'admin');
    }
}