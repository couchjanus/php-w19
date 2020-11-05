<?php
require_once CORE.'/View.php';
require_once CORE.'/Redirector.php';

class Controller
{
   protected $view;
   public $request;
   public $redirector;

   function __construct(Request $request = null)
   {
       $this->request      =  $request  !== null ? $request  : new Request();
       $this->view         =  new View($this);
       $this->redirector   =  new Redirector();
   }

}
