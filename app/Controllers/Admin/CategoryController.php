<?php
// CategoryController.php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Category.php';
require_once CORE.'/Helper.php';

class CategoryController extends Controller
{
    protected static $fileName;
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

    private function check_file_array($file) {
        return isset($file['error'])
            && !empty($file['name'])
            && !empty($file['type'])
            && !empty($file['tmp_name'])
            && !empty($file['size']);
    }
   

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;

        // if (!empty($this->request->data['image'])) {
        //     $file = $this->request->data['image'];
        //     $uploadDir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR.'assets/images/categories';
        //     if($this->check_file_array($file)) {
        //         if(is_uploaded_file($file["tmp_name"])) {
        //             $filename = sha1(mt_rand(1, 9999) . $file['name'] . uniqid()) . time();
        //             $uploaded = $uploadDir .'/'. $filename;
        //             move_uploaded_file($file["tmp_name"], $uploaded);
        //         } else {
        //                 throw new Exception('Upload: Can\'t upload file.');
        //         }
        //     }else {
        //         throw new Exception('Upload: Can\'t upload file.');
        //     }
        // }
        // $fileName =$this->getFileName();
        // (new Category())->save(['name'=>$this->request->data['name'], "image"=>self::$fileName, 'status'=>$status]);

        (new Category())->save(['name'=>$this->request->data['name'], 'status'=>$status, "image"=>$this->request->data['file_name']]);
        $this->redirector->redirect("/admin/categories");
    }

    // insert image
    public function insertImage() {
        if (!empty($this->request->data['image'])) {
            list($file, $filename) =$this->fileName($this->request->data['image']);
            $uploaded = Helper::asset('categories', $filename);
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

    public function show($vars)
    {
        extract($vars);
        $title = 'Category Detail';
        $category = (new Category())->getByPK($id);
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

        if (!empty($this->request->data['image'])) {
            $category = (new Category())->getByPK($this->request->data['id']);
            $imageName = Helper::asset('categories', $category->image);
            if(file_exists($imageName)){
                unlink($imageName);
            }
        }
        (new Category())->update($this->request->data['id'], ['name'=>$this->request->data['name'], 'status'=>$status, "image"=>$this->request->data['file_name']]);
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