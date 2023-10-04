<?php
class Form_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); {
            $this->load->model('form_model');
            $this->load->model("crud_model");
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');



        }

    }

    public function ajax_process_registration()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            // $this->load->model('form_model');
            $return = $this->form_model->insert_user($data);
            if ($return == true)
                echo json_encode(array('status' => 'true'));
            else
                echo json_encode(array('status' => 'false'));


            // $this->db->insert('users',$data);

        }
    }
    public function process_registration()
    {
        $this->load->view('register');
    }
    public function ajax_login()
    {
        if ($this->input->post()) {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->form_model->checkLogin($email, $password);
            if ($result) {
                $this->session->set_userdata('logged_in', true);
                echo json_encode(['data' => 'true', 'url' => base_url('form_controller/userpage')]);
            } else {
                echo json_encode(['data' => 'false']);

            }
        }



    }
    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('form_controller/userpage');
        } else {
            $this->load->view('login');
            // $this->ajax_login();
        }
    }

    public function userpage()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('form_controller/login'));
        }
        $this->load->view('userpage');
    }



    public function logout()
    {

        $this->session->sess_destroy();
        redirect(base_url('form_controller/login'));
    }



    //controller for fetching data from db
    public function getSubjects()
    {
        $this->load->database();
        $data = $this->db->get('course_subject_master')->result_array();
        echo json_encode($data);
    }
    public function getTopics()
    {
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
    // public function getQuestion(){
    //     $this->load->database();

    //     $sub=$this->input->post('subject_id');
    //     $top=$this->input->post('topic_id');
    //     $this->db->select(['question','option_1','option_2','option_3','option_4']);
    //     $this->db->where(['subject_id'=>$sub,'topic_id'=>$top]);
    //     $data=$this->db->get('course_question_bank_master')->result_array();
    //     echo json_encode($data);
    // }


    public function getQuestion()
    {
        $this->load->database();

        $sub = $this->input->post('subject_id');
        $top = $this->input->post('topic_id');

        // select statement to include 'question' and all options
        $this->db->select([
            ' question',
            'option_1 AS option1',
            '1 AS option_order',
            'option_2 AS option2',
            '2 AS option_order',
            'option_3 AS option3',
            '3 AS option_order',
            'option_4 AS option4',
            '4 AS option_order',
            'answer '
        ]);
        $this->db->where(['subject_id' => $sub, 'topic_id' => $top]);

        $data = $this->db->get('course_question_bank_master')->result_array();



        echo json_encode($data);
    }


    public function get_csv($sub,$top)
    {
        $this->load->database();
        // $this->load->model('form_model');

        //   $sub = $this->input->post('subject_id');
        //   $top = $this->input->post('topic_id');

        // $this->db->select('question, option_1, option_2, option_3, option_4, answer');


        // $q = $this->db->get_where('course_question_bank_master',['subject_id'=>$sub, 'topic_id'=>$top]);
        // $usersData = $q->result_array();

        // Check if there are records to export

        // $filename = 'users_'.date('Ymd').'.csv';
        // Set headers for CSV download
        //$usersData = $this->form_model->csvModel();
        $this->db->select('question, option_1, option_2, option_3, option_4, answer');
        $q = $this->db->get_where('course_question_bank_master', ['subject_id' => $sub, 'topic_id' => $top]);

        $usersData = $q->result_array();
        

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=questions.csv");
        header("Content-Type: text/csv");
        //get data




        // $output = fopen("php://output", "w");
        $file = fopen('php://output', 'w');
        fputs($file, "\xEF\xBB\xBF");
        // Output the CSV column headers
        $header = array('question', 'option_1', 'option_2', 'option_3', 'option_4', 'answer');

        fputcsv($file, $header);
        
        // Output each row of data
        // foreach ($usersData as $row) {
        //     fputcsv($file, $row);
        // }
        foreach ($usersData as $line) {

// print_r($line);die;
            $nestedDataCSV = array();
            $nestedDataCSV[] = strip_tags($line['question']);
            $nestedDataCSV[] = strip_tags($line['option_1']);
            $nestedDataCSV[] = strip_tags($line['option_2']);
            $nestedDataCSV[] = strip_tags($line['option_3']);
            $nestedDataCSV[] = strip_tags($line['option_4']);
            $nestedDataCSV[] = strip_tags($line['answer']);
            
            fputcsv($file, $nestedDataCSV);
        }
        // Close the file pointer
        fclose($file);

        exit;




    }

}

?>