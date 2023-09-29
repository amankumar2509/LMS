<?php
class Crud_controller extends CI_Controller{
    // public function getUsers(){
    //     $this->load->model('crud_model');
    //     $users=$this->crud_model->getUserData();
    //     $data['data'] = $users;
    //     echo json_encode($data);
    // }

    public function main(){
    $this->load->database();

        $this->db->select('id,name');
        $result = $this->db->get('course_subject_master')->result_array();
        echo "<pre/>"; print_r($result);
    }

    public function topic(){
    $this->load->database();
       $sub_id = 71;
        $this->db->select('topic');
        $this->db->where('subject_id',$sub_id);
        $result = $this->db->get('course_subject_topic_master')->result_array();
        echo "<pre/>"; print_r($result);


    }
  
    
}    
?>