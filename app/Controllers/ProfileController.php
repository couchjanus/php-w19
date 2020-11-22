<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Order.php';
require_once MODELS.'/Product.php';
require_once CORE.'/Helper.php';
require_once CORE.'/Auth.php';

require_once CORE.'/AuthInterface.php';

/**
 * ProfileController.php
 * 
 */
class ProfileController extends Auth implements AuthInterface
// class ProfileController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function isAdmin()
    {
        return $this->user->role_id;
    }

    /**
     * страница index
     *
     * @return bool
     */
    public function index()
    {
        if (!$this->user) {
            header('Location: /#login');
        }
        $title = 'Личный кабинет ';
        $user = $this->user;
        $this->view->render('profile/index', compact('title', 'user'));
    }

    /**
     * Просмотр истории заказов пользователя
     *
     * @return bool
    */
    public function ordersList()
    {
        if (!$this->user) {
            header('Location: /#login');
        }
        $sql = "SELECT id, status, products, DATE_FORMAT(`order_date`, '%d.%m.%Y %H:%i:%s') AS formated_date
                FROM orders WHERE user_id = ?
                ORDER BY id DESC";
        $orders = (new Order)->getItemsById($sql, $this->user->id);

        $title = 'Личный кабинет ';
        $subtitle = 'Ваши заказы ';
        $user = $this->user;
        $this->view->render('profile/orders', compact('user', 'orders', 'title', 'subtitle'));
    }

    public function orderView($vars)
    {
        if (!$this->user) {
            header('Location: /#login');
        }
        extract($vars);
        
        list($orders, $order) = $this->getOrder($id);
        $products = [];

        $sql = "SELECT * FROM products WHERE id = ?";

        foreach ($orders as $ord){
            $item = (new Product)->getItemById($sql, $ord['id']);
            array_push($products, [
                "id"=>$ord['id'],
                "amount"=>$ord['amount'],
                'name' => $item->name,
                'price' => $item->price,
                'image' => $item->image
            ]);
        }
        
        $title = 'Ваш заказ #'.$id;
        $user = $this->user;
        $this->view->render('profile/order', compact('user', 'order', 'title',  'products'));
    }

    /**
     * Выбираем заказ по его id
     *
     * @param $id
     * @return mixed
     */
    private function getOrder($id)
    {
        if (!$this->user) {
            header('Location: /#login');
        }
        $order = (new Order)->getByPK($id);
        return [json_decode($order->products, true), $order];
    }
   
    public function checkOrder($vars)
    {
        if (!$this->user) {
            header('Location: /#login');
        }

        extract($vars);
        list($orders, $order) = $this->getOrder($id);
        $products = [];
        $total = 0;
        $sql = "SELECT * FROM products WHERE id = ?";
        foreach ($orders as $ord){
            $item = (new Product)->getItemById($sql, $ord['id']);
            $total += $ord['amount']*$item->price;
        }
        $title = 'Product Order Form';
        $user = $this->user;
        $this->view->render('profile/checkout', compact('title', 'user', 'total', 'order'), 'check');
    }
    
}