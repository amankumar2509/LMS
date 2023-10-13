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
    

    public function addQuestion($data){

        $inserted=$this->db->insert('course_question_bank_master',$data);
        return $inserted;
    }
        //INSERT INTO `course_question_bank_master` ( `question`,`subject_id`, `topic_id`,`option_1`, `option_2`, `option_3`, `option_4`,`answer`,`lang_code`) VALUES ('abcd','1', '919','a', 'b', 'c', 'd','2','1');
    }
?>