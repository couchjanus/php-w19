<?php
// HomeController.php
require_once CORE.'/Controller.php';
require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';

class HomeController extends Controller
{

  public function index()
  {
      $title = 'Our <b>Best Cat Members Home Page </b>';
      $this->view->render('home/index', compact('title'));
  }

    public function getProducts()
    {
        $products = (new Product)->all();
        echo json_encode($products);
    }

    public function getProduct($vars)
    {
        extract($vars);
        $product = (new Product)->getPK($id);
        echo json_encode($product);
    }

    public function getCategories()
    {
        $categories = (new Category)->all();
        echo json_encode($categories);
    }
    
}
