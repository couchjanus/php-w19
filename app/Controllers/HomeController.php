<?php
// HomeController.php

class HomeController
{
    // Class properties and methods go here   
    // public function __construct()
    // {
    //     $title = 'Our Best Cat Members Home Page';
    //     render('home/index', compact('title'));
    // }

    // public function index()
    // {
    //   $title = 'Our <b>Best Cat Members Home Page </b>';
    //     // render('home/index', ['title'=>$title]);
    //     render('home/index', compact('title'));
    // }
    public function index()
    {
      $title = 'Our <b>Best Cat Members Home Page </b>';
      // render('home/index', ['title'=>$title]);
      $this->render('home/index', compact('title'));
    }

    public function render($template, $data = null, $layout='site') 
    {
        if ( !empty($data) ) {  
          extract($data); 
        }
        $template .= '.php';
        return require VIEWS."/layouts/${layout}.php";
    }
}
