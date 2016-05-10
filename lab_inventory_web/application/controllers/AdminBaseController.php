<?php

/**
 * Created by PhpStorm.
 * User: akbar.pambudi
 * Date: 3/27/2016
 * Time: 10:13 PM
 */
class AdminBaseController extends CI_Controller
{
    /***
     * load library in constructor
     */
    public function __construct()
    {
        parent::__construct();
        //load template lib
        $this->load->library('TemplatedView');
        $this->load->library('session');
       // $this->template = $this->TemplatedView;
        //set controller instance
        $this->view->setController($this);
        $this->view->template="admin_template/full";
        $this->view->meta="base_template/meta";
        $this->view->scripts="admin_template/adminScript";
        $this->view->header="admin_template/header";
        $this->view->addAttribute('headerMsg','home admin');
        $this->view->addAttribute("menus",$this->session->userdata('menus'));
        $this->view->stylesheet="admin_template/adminStylesheet";

    }
}
?>