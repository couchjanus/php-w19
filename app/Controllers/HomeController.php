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
        $product = (new Product)->getByPK($id);
        echo json_encode($product);
    }

    public function getCategories()
    {
        $categories = (new Category)->all();
        echo json_encode($categories);
    }

    public function getCategoriesWithCount()   {
        $sql = "SELECT COUNT(*) count_product, category_id, categories.* FROM products 
        INNER JOIN categories
        ON categories.id = products.category_id
        WHERE categories.status =1 GROUP BY category_id";
        $categories = (new Category)->getWithSql($sql);
        echo json_encode($categories);
    }
 
    
}
