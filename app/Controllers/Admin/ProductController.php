<?php
// ProductController.php

require_once CORE.'/Controller.php';

require_once CORE.'/Helper.php';
require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Brand.php';


class ProductController extends Controller
{
    protected $product;
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
         $resource = Product::getResource();
         $this->view->render('admin/products/create', compact('title', 'categories', 'brands', 'resource'), 'admin');
    }

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;

        (new Product())->save(
            [
                'name'=>$this->request->data['name'], 
                'description'=>$this->request->data['description'], 
                'status'=>$status, 
                'is_new'=>$is_new, 
                'brand_id'=>$this->request->data['brand_id'],
                'category_id'=>$this->request->data['category_id'],
                'price'=>$this->request->data['price'], 
                "image"=>$this->request->data['file_name']
            ]);
        $this->redirector->redirect("/admin/products");
    }

    public function show($vars)
    {
        extract($vars);
        $title = 'product Detail';
        $product = (new Product())->getByPK($id);
        $this->view->render('admin/products/show', compact('title', 'product'), 'admin');
    }

    private function fileName($fileContent){
        $image = explode(";", $fileContent);
        $image = explode(",", array_pop($image));
        $fileContent = base64_decode(array_pop($image));
        return [$fileContent, sha1(mt_rand(1, 9999) . uniqid()) . time()];
    }

    // insert image
    public function insertImage() {
        if (!empty($this->request->data['image'])) {
            list($fileContent, $filename) =$this->fileName($this->request->data['image']);
            $uploaded = Helper::asset('images/products/', $filename);
            file_put_contents($uploaded, $fileContent);
        }   
        echo $filename;
    }

    public function edit($vars)
    {
        $title = 'Edit product';
        extract($vars);
        $product = (new Product())->getByPK($id);
        $categories = (new Category())->all();
        $brands = (new Brand())->all();
        $resource = Product::getResource();
        $this->view->render('admin/products/edit', compact('title', 'product', 'categories', 'brands', 'resource'), 'admin');
    }

    public function update()
    {
        $this->product = new Product();
        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;
        $product = $this->product->getByPK($this->request->data['id']);

        if (!empty($this->request->data['image'])) {
            $imageName = Helper::asset('images/products', $product->image);
            if(file_exists($imageName)){
                unlink($imageName);
            }
        }

        $this->product->update($this->request->data['id'], 
            [
                'name'=>$this->request->data['name'], 
                'description'=>$this->request->data['description'], 
                'status'=>$status, 
                'is_new'=>$is_new, 
                'brand_id'=>$this->request->data['brand_id'], 
                'category_id'=>$this->request->data['category_id'], 
                'price'=>$this->request->data['price'], 
                "image"=>$this->request->data['file_name']
            ]);
        
        $this->redirector->redirect("/admin/products");
    }

    public function delete($vars)
    {
        extract($vars);

        $this->product = new Product();
        $product = $this->product->getByPK($id);

        if (isset($this->request->data['submit'])) {
            $imageName = Helper::asset('images/products/', $product->image);
            if(file_exists($imageName)){
                unlink($imageName);
            }
            $this->product->destroy($id);
            $this->redirector->redirect("/admin/products");

        } elseif (isset($this->request->data['reset'])) {
            $this->redirector->redirect("/admin/products");
        }
        $title = 'Delete product ';
        $this->view->render('admin/products/delete', compact('title', 'product'), 'admin');
    }

}