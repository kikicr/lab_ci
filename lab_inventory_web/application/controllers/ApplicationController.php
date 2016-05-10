<?php

/**
 * Created by PhpStorm.
 * User: akbar.pambudi
 * Date: 3/27/2016
 * Time: 10:57 PM
 */
require_once 'adminBaseController.php';
/**
 * ApplicationController
 * 
 * @package ci_inventory
 * @author Boomer
 * @copyright 2016
 * @version $Id$
 * @access public
 */
class ApplicationController extends CI_Controller
{
  //load all lib here
    public function __construct()
    {
        parent::__construct();
        //load template lib
        $this->load->library('TemplatedView');
       $this->load->library('session');
        // $this->template = $this->TemplatedView;
        //set controller instance
        $this->view->template="login_template/login_template";
        $this->view->meta="base_template/meta";
        $this->view->scripts="base_template/scripts";
        $this->view->stylesheet="base_template/stylesheet";
        $this->view->footerScripts="base_template/footerScripts";
        $this->view->setController($this);
        //$this->view->addAttribute('headerMsg','home admin');
        //load model
        $this->load->model('UserIdentity');
        $this->load->model('Role');
        $this->load->model('UserLogin');
        
    }

    /***
     * handling login page
     * GET
     */
    public function login(){
//        $this->view->actionTitle = "login";
        $this->view->addAttribute("roles",$this->role->getAll());
        $this->view->serve("application/login");
            
    }
    /***
     * Handling login page
     * POST*
     */
    public function doLogin(){
        $username = $this->input->post('username');
        $password = $this->input->post("password");
        $role     = $this->input->post("role");
        $response = $this->userLogin->login($username,$password,$role);
        if($response['status'] == "200"){
            //login successfull
            //save auth data into session
            $this->session->set_userdata($response['auth']); 
                       
        }else{
        //login failure
        
        $this->view->addAttribute('msg',$response['msg']);
        $this->view->addAttribute('roles',$this->role->getAll());
        $this->view->serve("application/login");
        }
    }
    /***
     * Handling register page
     * GET
     */
    public function register(){
        $this->view->serve("application/register");
    }
    /***
     * Handling register page
     * POST
     */
    public function doRegister(){
        $this->view->serve("application/register");
    }

}