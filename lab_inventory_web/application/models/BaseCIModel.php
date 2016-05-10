<?php

    class BaseCIModel extends CI_Model{
        protected $table ="";
        protected $primaryKey ="";        
        public function __construct(){
            $this->load->database();
            parent::__construct();
        }
        
        /***/
        public function getAll(){
           
            $query = $this->db->get($this->table);
            return $query->result();
        }
        
        /***/
        public function get($id){
           
             $this->db->where($this->primaryKey,$id);
             $query = $this->db->get($this->table);
            return $query->result();
        }
        /***
        *@return 0 =>insert,1=>update
        */
        
        public function save($rowValue = array()){
            //check is id exists
            if(array_key_exists($rowValue,$this->primaryKey)){
                if(count($this->get($rowValue[$this->primaryKey])>0)){
                    //update statement
                    $this->db->replace($this->table,$rowValue); 
                return 1;
                }
                
            }
            
            //insert statement
            $this->db->insert($this->table,$rowValue);
            return 0;
        }
        /***/
        public function delete($id){
            $this->db->delete($this->table,array($this->primaryKey,$id));
            
        }
        

    }