<?php
class Form_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }
    
    public function insert_user($data) {
        if ($this->db->insert('users', $data)) {
            return true; 
        } else {
            echo $this->db->error()['message'];
            return false; 
        }
    }
    public function checkLogin($email,$password){
        $query=$this->db->get_where('users',array('email'=>$email,'password'=>$password));
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
       
    } 
 }
?>
