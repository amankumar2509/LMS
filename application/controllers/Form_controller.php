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

    public function index()
    {
        $this->load->view('template/users-profile');
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
    // public function ajax_login()
    // {
    //     if ($this->input->post()) {

    //         $email = $this->input->post('email');
    //         $password = $this->input->post('password');
    //         $result = $this->form_model->checkLogin($email, $password);
    //         if ($result) {
    //             $this->session->set_userdata('logged_in', true);
    //             echo json_encode(['data' => 'true', 'url' => base_url('form_controller/userpage')]);
    //         } else {
    //             echo json_encode(['data' => 'false']);

    //         }
    //     }



    // }
    public function ajax_login()
    {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->form_model->checkLogin($email, $password);

            if ($user) {
                if ($user->status == 1) {
                    // User is an admin
                    $this->session->set_userdata('logged_in', true);
                    $this->session->set_userdata('user_role', 'admin');
                    echo json_encode(['data' => 'true', 'url' => base_url('form_controller/adminpage')]);
                } else {
                    // User is a regular user
                    $this->session->set_userdata('logged_in', true);
                    $this->session->set_userdata('user_role', 'user');
                    echo json_encode(['data' => 'true', 'url' => base_url('form_controller/userpage')]);
                }
            } else {
                echo json_encode(['data' => 'false']);
            }
        }
    }


    // public function login()
    // {
    //     if ($this->session->userdata('logged_in')) {
    //         redirect('form_controller/userpage');
    //     } else {
    //         $this->load->view('login');
    //         // $this->ajax_login();
    //     }
    // }
    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            $user_role = $this->session->userdata('user_role');
            if ($user_role == 'admin') {
                redirect('form_controller/adminpage');
            } else {
                redirect('form_controller/userpage');
            }
        } else {
            $this->load->view('login');
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

    // public function getSubjects()
    // {
    //     $searchTerm = $this->input->post('search');
    //    
    //        
    //    
    //         $this->db->where('id, name', $searchTerm);


    //     $this->load->database();

    //     $data = $this->db->get('course_subject_master')->result_array();
    //     echo json_encode($data);
    // }
    // //     


    // public function getSubjects()
    // {

    //     $this->load->database();

    //     $this->db->select('id,name,image');

    //     $data = $this->db->get('course_subject_master')->result_array();
    //     echo json_encode($data);
    // }


    public function adminpage()
    {
        $this->load->view('adminpage');


    }
    public function ajax_getAdmindata()
    {
        $this->load->database();
        $data = $this->db->get('users')->result();
        //echo json_encode($data);
        echo json_encode(['data' => $data]);
    }


    public function getSubjects()
    {
        $this->load->database();

        $searchTerm = $this->input->post('search');

        $this->db->select('id, name, image');
        $this->db->limit(20);
        // if (!empty($searchTerm)) {

        //     $this->db->like('name', $searchTerm, 'both'); // 'both' means search for the term anywhere in the 'name' field
        //     $this->db->like('id', $searchTerm, 'both'); 
        // }
        if (!empty($searchTerm)) {
            $this->db->group_start();
            if (is_numeric($searchTerm)) {
                $this->db->like('id', $searchTerm, 'after');
            } else {
                $this->db->like('name', $searchTerm, 'after');
            } //'both' means search for the term anywhere in the 'name' field
            $this->db->group_end();
        }

        $data = $this->db->get('course_subject_master')->result_array();

        // print($this->db->last_query());die;

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
        $lang = $this->input->post('lang_id');

        // select statement to include 'question' and all options
        $this->db->select([
            'id',
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

        $this->db->where(['subject_id' => $sub, 'topic_id' => $top, 'lang_code' => $lang]);

        $data = $this->db->get('course_question_bank_master')->result_array();



        echo json_encode($data);
    }


    public function get_csv($sub, $top, $lang)
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
        $this->db->select('question, option_1, option_2, option_3, option_4, answer,description');
        $q = $this->db->get_where('course_question_bank_master', ['subject_id' => $sub, 'topic_id' => $top, 'lang_code' => $lang]);

        $usersData = $q->result_array();


        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=questions.csv");
        header("Content-Type: text/csv");
        //get data




        // $output = fopen("php://output", "w");
        $file = fopen('php://output', 'w');
        fputs($file, "\xEF\xBB\xBF");
        // Output the CSV column headers
        $header = array('question', 'option_1', 'option_2', 'option_3', 'option_4', 'answer', 'description');

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
            // $nestedDataCSV[] = strip_tags($line['description']);
            $description = htmlspecialchars_decode(strip_tags($line['description']), ENT_QUOTES | ENT_HTML5);
            $description = str_replace('&nbsp;', "\xC2\xA0", $description);
            $nestedDataCSV[] = $description;
            fputcsv($file, $nestedDataCSV);
        }
        // Close the file pointer
        fclose($file);

        exit;




    }
    public function get_word($sub, $top, $lang)
    {
        $this->load->database();
        $this->db->select('question, option_1, option_2, option_3, option_4, answer, description');

        $q = $this->db->get_where('course_question_bank_master', ['subject_id' => $sub, 'topic_id' => $top, 'lang_code' => $lang]);
        $usersData = $q->result_array();


        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=questions.doc");
        header("Content-Type: application/vnd.ms-word");
        $file = fopen('php://output', 'w');
        fputs($file, "\xEF\xBB\xBF");
        // $header=array('question', 'option_1', 'option_2', 'option_3', 'option_4', 'answer');
        // $headerString=implode(',',$header);
        // fputs($file,$headerString);

        //  foreach ($usersData as $line) {
        //      fputcsv($file, $line);
        //  }
        foreach ($usersData as $line) {

            // print_r($line);die;
            // $nestedData = array();
            // $nestedData[] ='Question'. strip_tags($line['question']);
            // $nestedData[] = 'Option_1:'.strip_tags($line['option_1']);
            // $nestedData[] = 'option_2:'.strip_tags($line['option_2']);
            // $nestedData[] = 'option_3:'.strip_tags($line['option_3']);
            // $nestedData[] = 'option_4:'.strip_tags($line['option_4']);
            // $nestedData[] = 'Answer:'.strip_tags($line['answer']);
            // fputcsv($file, $nestedData);
            $content = 'Question: ' . preg_replace('/[,"]+/', '', strip_tags($line['question'])) . PHP_EOL;
            $content .= 'Option_1: ' . preg_replace('/[,"]+/', '', strip_tags($line['option_1']));
            $content .= 'Option_2: ' . preg_replace('/[,"]+/', '', strip_tags($line['option_2']));
            $content .= 'Option_3: ' . preg_replace('/[,"]+/', '', strip_tags($line['option_3']));
            $content .= 'Option_4: ' . preg_replace('/[,"]+/', '', strip_tags($line['option_4'])) . PHP_EOL;
            $content .= 'Answer: ' . preg_replace('/[,"]+/', '', strip_tags($line['answer'])) . PHP_EOL;
            // $content .= 'Solution: ' . preg_replace('/[,"]+/', '', strip_tags($line['description'])) . PHP_EOL . PHP_EOL;
            $content .= 'Description: ' . str_replace('&nbsp;', "\xC2\xA0", htmlspecialchars_decode(strip_tags($line['description']), ENT_QUOTES | ENT_HTML5)) . PHP_EOL . PHP_EOL;

            fwrite($file, $content);
        }
        fclose($file);
        exit;


    }
    public function deleteData()
    {
        $this->load->model('Crud_model');
        // print_r($_POST);die;
        $id = $_POST['id'];
        $response = $this->crud_model->deleteUser($id);
        if ($response == 1) {
            echo 1;
        } else {
            echo 2;
        }
    }
    public function updateInfo()
    {
        $id = $_POST['id'];
        // print_r($id);
        $data = $this->db->get_where('users', ['id' => $id])->row_array();
        // print_r($data);die;
        echo json_encode($data);
    }
    public function infoChange()
    {
        $id = $_POST['id'];
        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email']
        );
        $this->db->where('id', $id);
        $update = $this->db->update('users', $data);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function addQuestion()
    {
        $this->load->view('question');
    }
    // public function ajax_addQuestion(){
    //     $this->load->model('Crud_model');
    // }


    public function ajax_addQuestion()
    {
        // Handle the AJAX request here]
         $input = $this->input->post();
        if ($input) {
            $data=[
                'question'=>$input['question'], //right side from db and left side from ajax
                'topic_id'=>$input['topic'],
                'subject_id'=>$input['subject'],
                'answer'=>$input['answer'],
                'option_1'=>$input['option1'],
                'option_2'=>$input['option2'],
                'option_3'=>$input['option3'],
                'option_4'=>$input['option4'],
                'lang_code'=>$input['language']
            ];
            $this->load->model('Crud_model');
           
            $result = $this->Crud_model->addQuestion($data);
            
            if ($result) {
                echo json_encode(array('status' => true));
            } else {
              //  echo json_encode(array('success' => false));
              echo json_encode(array('status' => false, 'error' => $this->db->error()));
            }
        }
       
    }

    public function deleteQuestion(){
        $id = $_POST['id'];
        $this->load->model('Crud_model');
        // print_r($_POST);die;
        
      // print_r($_POST);die;
        $response = $this->Crud_model->deleteQuestion($id);
        if ($response == 1) {
            echo 1;
        } else {
            echo 2;
        }
    }




}

?>