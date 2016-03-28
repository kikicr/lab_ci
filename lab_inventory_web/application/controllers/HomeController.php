<?php

/**
 * Created by PhpStorm.
 * User: akbar.pambudi
 * Date: 3/27/2016
 * Time: 10:57 PM
 */
require_once 'adminBaseController.php';
class HomeController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){

        $this->view->addAttribute('message','hello');
        $this->view->addAttribute('headerMsg','home admin|index');
        $this->view->buildView('admin/home-admin');
    }
    public function about(){
        $this->view->addAttribute('message','about');
        $this->view->addAttribute('headerMsg','home admin|about');
        $this->view->buildView('admin/home-admin');
    }
}