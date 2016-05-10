<?php
    /**
    *@since 1.0
    * user model
    */
    require_once('BaseCIModel.php');
    class UserLogin extends BaseCIModel {
        
        protected $table ="tb_user_login";
        
        protected $primaryKey ="idtb_user_login";
        
        public function __consturct(){
            parent::__construct();
            $this->load->helper('security');
            $this->load->model('Role');
            $this->load->model('RoleMenu');
            $this->load->model('Menu');
        }
        
        public function getByUsername($username){
            $this->db->where('user_name',$username);
            $query=$this->db->get($this->table);
            return $query->result();
        }
        
        
        public function login($username,$password,$role){
           $user = $this->getByUsername($username);
           if(count($user)<=0){
                //username not found
                return array("status"=>false,"msg"=>"invalid username");
           }
           //if username founded
           foreach($user as $usr){
          
                if($usr->password == sha1($password)){
                   
                   if($usr->role_id == $role){
                    //user has selected role
                     return array("status"=>"200","msg"=>"valid","auth"=>$this->getAuthData($usr));
                    }else{
                     return array("status"=>"0","msg"=>"wrong role");
                    }
                }
                
           }
           
           //if password doesn't match
           return array("status"=>"0","msg"=>"invalid password");
           
            
        }       
        
        
        //get full auth data
        public function getAuthData($user){
            $userAuth = array();
           // $userAuth['login_time'] = date();
            $userAuth['user']= $user;
            $userAuth['role'] = $this->role->get($user->role_id);
            $userAuth['menus'] = $this->roleMenu->getMenusByRoleId($user->role_id);
            
            return $userAuth;
        }
        
        
        
    }
