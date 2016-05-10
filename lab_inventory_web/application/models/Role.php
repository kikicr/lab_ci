<?php
    /**
    *@since 1.0
    * role 
    */
    require_once('BaseCIModel.php');
    class Role extends BaseCIModel {
        protected $primaryKey = "idrole";
        protected $table = "tb_role";
        public function __consturct(){
            parent::__construct();
        }
    
        
    }
