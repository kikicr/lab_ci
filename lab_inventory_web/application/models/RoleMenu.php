<?php
    /**
    *@since 1.0
    * role 
    */
    require_once('BaseCIModel.php');
    class RoleMenu extends BaseCIModel {
        protected $primaryKey = "idtb_menu_role";
        protected $table = "tb_menu_role";
        public function __consturct(){
            parent::__construct();
        }
        
        public function getMenusByRoleId($roleId){
             $query = $this->db->query("SELECT * FROM laboratory_inventory.tb_menu_role
                                        mr join laboratory_inventory.tb_menu m on mr.id_menu = m.idtb_menu 
                                        where mr.id_role =?",array($roleId));
                                        
            
            return $query->result_array();
        }
    
        
    }
