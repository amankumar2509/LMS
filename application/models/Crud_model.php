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
    public function deleteUser($id){
        $this->db->where('id', $id);
       $data = $this->db->delete("users");
      
        return $data;

      
    }
    

    public function addQuestion(){
        $inserted=$this->db->insert('course_question_bank_master',$data);
        return $inserted;
    }
        
    }
?>