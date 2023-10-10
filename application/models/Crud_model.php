<?php
    class Crud_model extends CI_Model
     {
        public function __construct() {
            parent::__construct();
            $this->load->database(); // Load the database library
        }
    //    public function getUserData(){
    //     return $this->db->get('users')->result_array();
        
        
    //    }
    public function get_users(){
        return $this->db->get('users')->result_array();
 
     }
      
        
    }
?>