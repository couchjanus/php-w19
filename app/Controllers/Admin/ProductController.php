<?php
// ProductController.php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once CORE.'/Helper.php';
require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Brand.php';


class ProductController extends Controller
{
    public function index()
    {
         $title = 'Products List';
         $products = (new Product())->all();
         $this->view->render('admin/products/index', compact('title', 'products'), 'admin');
    }

    public function create()
    {
         $title = 'Add New product';
         $categories = (new Category())->all();
         $brands = (new Brand())->all();
         $this->view->render('admin/products/create', compact('title', 'categories', 'brands'), 'admin');
    }

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;
        (new Product())->save(['name'=>$this->request->data['name'], 'description'=>$this->request->data['description'], 'status'=>$status, 'is_new'=>$is_new, 'brand_id'=>$this->request->data['brand_id'], 'category_id'=>$this->request->data['category_id'], 'price'=>$this->request->data['price'], "image"=>$this->request->data['file_name']]);
        $this->redirector->redirect("/admin/products");
    }

    public function show($vars)
    {
        extract($vars);
        $title = 'product Detail';
        $product = (new Product())->getByPK($id);
        $this->view->render('admin/products/show', compact('title', 'product'), 'admin');
    }

    // insert image
    public function insertImage() {
        if (!empty($this->request->data['image'])) {
            list($file, $filename) =$this->fileName($this->request->data['image']);
            $uploaded = Helper::asset('products', $filename);
            file_put_contents($uploaded, $file);
        }   
        echo $filename;
    }

    private function fileName($file){
        $image_array_1 = explode(";", $file);
        $image_array_2 = explode(",", $image_array_1[1]);
        $file = base64_decode($image_array_2[1]);
        return [$file, sha1(mt_rand(1, 9999) . uniqid()) . time()];
    }

    public function edit($vars)
    {
        $title = 'Edit product';
        extract($vars);
        $product = (new Product())->getByPK($id);
        $categories = (new Category())->all();
        $brands = (new Brand())->all();
        $this->view->render('admin/products/edit', compact('title', 'product', 'categories', 'brands'), 'admin');
    }

    public function update()
    {
        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;
        
        if (!empty($this->request->data['image'])) {
            $product = (new Product())->getByPK($this->request->data['id']);
            $imageName = Helper::asset('products', $product->image);
            if(file_exists($imageName)){
                unlink($imageName);
            }
        }
        (new Product())->update($this->request->data['id'], ['name'=>$this->request->data['name'], 'description'=>$this->request->data['description'], 'status'=>$status, 'is_new'=>$is_new, 'brand_id'=>$this->request->data['brand_id'], 'category_id'=>$this->request->data['category_id'], 'price'=>$this->request->data['price'], "image"=>$this->request->data['file_name']]);
        $this->redirector->redirect("/admin/products");
    }

    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            (new Product())->destroy($id);
            header('Location: /admin/products');
        } elseif (isset($_POST['reset'])) {
            header('Location: /admin/products');
        }
        $title = 'Delete product ';
        $product = (new Product())->getByPK($id);
        $this->view->render('admin/products/delete', compact('title', 'product'), 'admin');
    }
}