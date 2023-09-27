<?php
class Crud_controller extends CI_Controller{
    public function getUsers(){
        $this->load->model('crud_model');
        $users=$this->crud_model->getUserData();
        $data['data'] = $users;
        echo json_encode($data);
    }
    
}    
?>