<?php

class Adminmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addJob() {
        $data = array(
            'job_title' => $this->input->post('job_title'),
            'job_summary' => $this->input->post('job_summary'),
            'description' => $this->input->post('description'),
            'instructions' => $this->input->post('instructions'),
            'opening_date' => $this->input->post('opening_date'),
            'closing_date' => $this->input->post('closing_date'),
            'status' => "ACTIVE",
            'date_added' => date("Y/m/d H:i:sa"),
            'deletion_status' => "FALSE",
        );
        $this->db->insert('jobs_joblistings', $data);
        return $this->db->insert_id();
    }

    public function getAllJobs() {
        $this->db->order_by("job_id", "desc");
        $query = $this->db->get('jobs_joblistings');
        return $query->result();
    }

    public function getJobWithId($job_id) {
        $query = $this->db->get_where('jobs_joblistings', array('job_id' => $job_id));
        return $query->result();
    }

    public function addJobTest($job_id) {
        $data = array(
            'job_id' => $job_id,
            'test_name' => $this->input->post('test_name'),
            'test_description' => $this->input->post('test_description'),
            'pass_mark' => $this->input->post('pass_mark'),
            'test_duration' => $this->input->post('test_duration'),
            'level' => $this->input->post('level'),
            'date_added' => date("Y/m/d H:i:sa"),
            'deletion_status' => "FALSE",
        );
        $this->db->insert('jobs_jobtests', $data);
        return $this->db->insert_id();
    }

    public function getJobTestsWithJobId($job_id) {
        $query = $this->db->get_where('jobs_jobtests', array('job_id' => $job_id));
        return $query->result();
    }

    public function getJobTestWithId($test_id) {
        $query = $this->db->get_where('jobs_jobtests', array('test_id' => $test_id));
        return $query->result();
    }
    
    public function getJobTestTotalDuration($job_id) {
        $this->db->select_sum('test_duration');
        $this->db->from('jobs_jobtests');
        $this->db->where("job_id", $job_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function addJobTestQuestion($answer_setJSON) {
        $data = array(
            'test_id' => $this->input->post('test_id'),
            'question' => $this->input->post('question'),
            'answer_set' => $answer_setJSON,
            'answer' => $this->input->post('answer'),
            'date_added' => date("Y/m/d H:i:sa"),
            'deletion_status' => "FALSE",
        );
        $this->db->insert('jobs_testquestions', $data);
        return $this->db->insert_id();
    }

    public function getJobTestQuestions($test_id) {
        $query = $this->db->get_where('jobs_testquestions', array('test_id' => $test_id));
        return $query->result();
    }

    public function getJobTestQuestionWithId($question_id) {
        $query = $this->db->get_where('jobs_testquestions', array('question_id' => $question_id));
        return $query->result();
    }

    

}
