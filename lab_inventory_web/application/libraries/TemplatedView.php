<?php

/**
 * Created by PhpStorm.
 * User: akbar.pambudi
 * Date: 3/27/2016
 * Time: 9:32 PM
 */
class TemplatedView
{
    /**
     * array to hold store data
     * @var $viewWrapper
     */
    private $viewWrapper = array();
    /***
     * array to hold controller data
     * @var $attributes
     */
    private $attributes = array();
    /***
     * hold controller instance
     * @var $controller
     */
    private $controller = null;
    /***
     * hold full template directory
     * @var $fullTemplate
     */
    private $fullTemplate = null;
    /***
     * const of template prefix
     */
    const PREFIX = "template/";
    /***
     * pages prefix
     */
    const PAGES = "pages/";
    /***
     * set controller
     * @param $controller
     * @return void
     */
    public function setController($controller){
        $this->controller = $controller;
        $this->controller->load->helper('url');
    }

    /***
     * magic method setter
     * the value passed into $viewWrapper
     */
    public function __set($name, $value)
    {       //check is $name equals template
            if(strtolower($name) == 'template'){
                $this->fullTemplate = $this::PREFIX.$value;
            }
            else {
                //set value into $viewWrapper
                $this->viewWrapper[$name] = $this::PREFIX.$value;
            }
    }
    /***
     * magic method getter
     * the value get from $viewWrapper , if doesn't exist then return null
     * @return mixed
     */
    public function __get($name)
    {
        $isKeyExists = array_key_exists($name,$this->viewWrapper);
        if($isKeyExists){
            return $this->viewWrapper[$name];
        }else{
            return null;
        }
    }
    /***
     * use to store data from controller
     * @param $name , name of var in view
     * @param $value ,value of var
     */
    public function addAttribute($name,$value){
        $this->attributes[$name] = $value;
    }
    /**
     * showing template
     * @param $content
     * @return void
     */
    public function serve($content){
        $components = array();
        //get all content of viewWrappers and set result into $components
        foreach($this->viewWrapper as $key=>$value){
            $components[$key]=$this->controller->load->view($value, $this->attributes, true);
        }
        $components['content'] = $this->controller->load->view(TemplatedView::PAGES.$content, $this->attributes, true);
        //empty attribute
        $this->attributes = array();
        //set $components into $attributes with name template
        $this->addAttribute("template",$components);
        //passing $attributes into full template
        $this->controller->load->view($this->fullTemplate,$this->attributes);
        }



}