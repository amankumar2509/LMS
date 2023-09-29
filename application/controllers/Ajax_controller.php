<?php

class Ajax_controller extends CI_Controller {
    
    // public function getCourseTopics() {
    //     $selectedValue = $this->input->post('selectedValue'); // Get the selected value from the POST data
        
    //     // Load the model responsible for database operations
    //     $this->load->model('CourseModel');
        
    //     // Call a method in the model to fetch data for course_subject_topic_master
    //     $data = $this->CourseModel->getTopicsBySubject($selectedValue);
        
    //     // Send the data as a JSON response
    //     echo json_encode($data);
    // }
public function getSubjects(){
    $this->load->database();
    $data['data'] = $this->db->get('course_subject_master')->result_array();
    json_encode($data);
}
    public function getTopics() {
        $this->load->database();
        $selectedOption = $this->input->post('selected_option'); // Get selected value from the first dropdown
         $this->db->select('cstm.*');
        $this->db->where('cstm.subject_id', $selectedOption);
        $data = $this->db->get('course_subject_topic_master as cstm')->result_array();
        // echo "<pre>";
        // print_r($data) ;
        
        // echo "</pre>" ;
        // $topics = $this->your_model->getTopicsByOption($selectedOption); // Replace with your model logic
        echo json_encode($data); // Return topics as JSON
    }
}
?>