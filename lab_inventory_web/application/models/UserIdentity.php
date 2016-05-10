<?php
    /**
    *@since 1.0
    * role 
    */
    require_once('BaseCIModel.php');
    class UserIdentity extends BaseCIModel {
        
        protected $primaryKey = "tb_user_identity";
        
        protected $table = "idtb_user_identity";
        
        public function __consturct(){
           
            parent::__construct();
           
        }

    }
