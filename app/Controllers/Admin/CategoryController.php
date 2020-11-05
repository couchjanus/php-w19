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
}