<?php

// application/models/CourseModel.php

class CourseModel extends CI_Model {

    public function getTopicsBySubject($selectedValue) {
        // Assuming you have a database table named 'course_subject_topic_master'
        // and a column 'subject_id' that corresponds to the selected value

        // Sanitize and validate $selectedValue to prevent SQL injection
        $selectedValue = $this->db->escape_str($selectedValue);

        // Query the database to fetch data for course_subject_topic_master
        $query = $this->db->select('topic_id, topic_name')
            ->from('course_subject_topic_master')
            ->where('subject_id', $selectedValue)
            ->get();

        if ($query->num_rows() > 0) {
            // Convert the result to an associative array
            return $query->result_array();
        } else {
            // Return an empty array or handle the case where no data is found
            return array();
        }
    }
}

?>
