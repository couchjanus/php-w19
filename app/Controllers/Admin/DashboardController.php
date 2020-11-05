<?php
// DashboardController.php
require_once CORE.'/Controller.php';

class DashboardController extends Controller
{
   public function index()
   {
        $title = 'Dashboard';
        $this->view->render('admin/index', ['title'=>$title], 'admin');
   }
}
