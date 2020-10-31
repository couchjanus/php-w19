<?php
// AboutController.php

// class AboutController
// {
//     // Class properties and methods go here   
//     // public function __construct()
//     // {
//     //     render('about/index', ['title'=>'About Our Cats Members']);
//     // }

//     // public function index()
//     // {
//     //     $title = 'About <b>Our Cats</b> Members';
//     //     render('about/index', ['title'=>$title]);
//     // }
// }

// AboutController.php
require_once CORE.'/Controller.php';

class AboutController  extends Controller
{
    public function index()
    {
        $title = 'About <b>Our Cats</b> Members';
        $this->view->render('about/index', ['title'=>$title]);
    }
}