<?php

require_once('AdminBaseController.php');

class AdminController extends AdminBaseController{
    public function __construct(){
        parent::__construct();
        
    }
    
    public function home(){
        $this->view->serve('admin/home');
    }
}