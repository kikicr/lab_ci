<?php
    /**
    *@since 1.0
    * role 
    */
    require_once('BaseCIModel.php');
    class Menu extends BaseCIModel {
        protected $primaryKey = "idtb_menu";
        protected $table = "tb_menu";
        public function __consturct(){
            parent::__construct();
        }
    
        
    }
