<?php

class Applicationsmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addApplication($job_id) {
        $data = array(
            'job_id' => $job_id,
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'idno' => $this->input->post('idno'),
            'application_date' => date("Y/m/d"),
            'application_status' => "PENDING",
            'application_comments' => "",
            'date_added' => date("Y/m/d H:i:sa"),
            'deletion_status' => "FALSE",
        );
        $this->db->insert('applications_applications', $data);
        return $this->db->insert_id();
    }

    public function checkIfUserApplicationExists($emailToSearch, $job_id) {
        $this->db->where('email', $emailToSearch);
        $this->db->where('job_id', $job_id);
        $this->db->from('applications_applications');
        return $this->db->count_all_results();
    }

    public function addInterviewTestSubmission($application_id, $test_id, $question_id, $submitted_answer, $correct_answer, $pass, $score) {
        $data = array(
            'application_id' => $application_id,
            'test_id' => $test_id,
            'question_id' => $question_id,
            'submitted_answer' => $submitted_answer,
            'correct_answer' => $correct_answer,
            'pass' => $pass,
            'score' => $score,
            'date_added' => date("Y/m/d H:i:sa"),
            'deletion_status' => "FALSE",
        );
        $this->db->insert('applications_testsubmissions', $data);
        return $this->db->insert_id();
    }

    public function updateInterviewTestSubmissionItem($application_id, $question_id, $submitted_answer, $correct_answer, $pass, $score) {
        $data = array(
            'submitted_answer' => $submitted_answer,
            'correct_answer' => $correct_answer,
            'pass' => $pass,
            'score' => $score,
        );
        $this->db->where('application_id', $application_id);
        $this->db->where('question_id', $question_id);
        $this->db->update('applications_testsubmissions', $data);
        return $this->db->affected_rows();
    }

    public function checkIfInterviewTestSubmissionItemExists($application_id, $question_id) {
        $this->db->where('deletion_status', 'FALSE');
        $this->db->where('application_id', $application_id);
        $this->db->where('question_id', $question_id);
        $this->db->from('applications_testsubmissions');
        return $this->db->count_all_results();
    }

    public function getApplicantJobTestsResults($application_id) {
        $sql = "SELECT applications_testsubmissions.`application_id`, applications_testsubmissions.`test_id`, jobs_jobtests.`test_name`, jobs_jobtests.`pass_mark`, SUM(`score`) AS totalScore
                                    FROM `applications_testsubmissions` 
                                    INNER JOIN jobs_jobtests ON jobs_jobtests.`test_id`=applications_testsubmissions.`test_id`
                                    WHERE `application_id`= ?
                                    GROUP BY `test_id`";
        $query = $this->db->query($sql, array($application_id));
        return $query->result();
    }

    public function getJobTestsResultsWithApplicantionId($application_id, $test_id) {
        $sql = "SELECT applications_testsubmissions.`application_id`, applications_testsubmissions.`test_id`, jobs_jobtests.`test_name`, jobs_jobtests.`pass_mark`, SUM(`score`) AS totalScore
                                    FROM `applications_testsubmissions` 
                                    INNER JOIN jobs_jobtests ON jobs_jobtests.`test_id`=applications_testsubmissions.`test_id`
                                    WHERE `application_id`= ? AND applications_testsubmissions.`test_id`= ?";
        $query = $this->db->query($sql, array($application_id, $test_id));
        return $query->result();
    }

    public function getJobTestsApplicants($job_id) {
        $sql = "SELECT applications_testsubmissions.`test_id`, jobs_jobtests.`test_name`, jobs_jobtests.`pass_mark`, jobs_jobtests.`level`, COUNT(DISTINCT(`application_id`)) AS totalApplicants
                                    FROM applications_testsubmissions
                                    INNER JOIN jobs_jobtests ON jobs_jobtests.`test_id`=applications_testsubmissions.`test_id`
                                    WHERE jobs_jobtests.`job_id`= ?
                                    GROUP BY `test_id`";
        $query = $this->db->query($sql, array($job_id));
        return $query->result();
    }

    public function getApplicantsJobTestsResultsPASS($test_id) {
        $sql = "SELECT applications_testsubmissions.`application_id`, applications_testsubmissions.`test_id`, applications_applications.`fname`, applications_applications.`lname`, applications_applications.`email`, applications_applications.`phone`, applications_applications.`application_date`, jobs_jobtests.`test_name`, jobs_jobtests.`pass_mark`, SUM(`score`) AS totalScore
                                    FROM `applications_testsubmissions`
                                    INNER JOIN applications_applications ON applications_applications.`application_id`=applications_testsubmissions.`application_id`
                                    INNER JOIN jobs_jobtests ON jobs_jobtests.`test_id`=applications_testsubmissions.`test_id`
                                    WHERE applications_testsubmissions.`test_id`= ?
                                    GROUP BY applications_testsubmissions.`application_id`
                                    HAVING totalScore>pass_mark";
        $query = $this->db->query($sql, array($test_id));
        return $query->result();
    }

    public function getApplicantsJobTestsResultsFAIL($test_id) {
        $sql = "SELECT applications_testsubmissions.`application_id`, applications_testsubmissions.`test_id`, applications_applications.`fname`, applications_applications.`lname`, applications_applications.`email`, applications_applications.`phone`, applications_applications.`application_date`, jobs_jobtests.`test_name`, jobs_jobtests.`pass_mark`, SUM(`score`) AS totalScore
                                    FROM `applications_testsubmissions`
                                    INNER JOIN applications_applications ON applications_applications.`application_id`=applications_testsubmissions.`application_id`
                                    INNER JOIN jobs_jobtests ON jobs_jobtests.`test_id`=applications_testsubmissions.`test_id`
                                    WHERE applications_testsubmissions.`test_id`= ?
                                    GROUP BY applications_testsubmissions.`application_id`
                                    HAVING totalScore<pass_mark";
        $query = $this->db->query($sql, array($test_id));
        return $query->result();
    }

    public function addApplicationDoc($application_id, $document_name) {
        $data = array(
            'application_id' => $application_id,
            'document_name' => $document_name,
        );
        $this->db->insert('applications_applicantdocs', $data);
        return $this->db->insert_id();
    }

    public function updateJobApplicationStatus($application_id) {
        $data = array(
            'application_status' => $this->input->post('application_status'),
            'application_comments' => $this->input->post('application_comments'),
        );
        $this->db->where('application_id', $application_id);
        $this->db->update('applications_applications', $data);
    }

    public function updateJobApplicationRecruitmentStatus($application_id) {
        $data = array(
            'application_status' => $this->input->post('application_status'),
            'application_comments' => $this->input->post('application_comments'),
        );
        $this->db->where('application_id', $application_id);
        $this->db->update('applications_applications', $data);
    }

    public function getAllApplications() {
        $query = $this->db->query("SELECT applications_applications.*, jobs_joblistings.`job_title`
                            FROM `applications_applications`
                            INNER JOIN jobs_joblistings ON jobs_joblistings.`job_id`=applications_applications.`job_id`
                            WHERE applications_applications.`deletion_status`='FALSE'
                            ORDER BY applications_applications.`application_id` DESC");
        return $query->result();
    }

    public function getJobApplicationWithId($application_id) {
        $sql = "SELECT applications_applications.*, jobs_joblistings.`job_title`
                            FROM `applications_applications`
                            INNER JOIN jobs_joblistings ON jobs_joblistings.`job_id`=applications_applications.`job_id`
                            WHERE applications_applications.`application_id`= ? AND applications_applications.`deletion_status`='FALSE'
                            ORDER BY applications_applications.`application_id` DESC";
        $query = $this->db->query($sql, array($application_id));
        return $query->result();
    }

    public function getJobListingApplications($job_id) {
        $sql = "SELECT applications_applications.*, jobs_joblistings.`job_title`
                            FROM `applications_applications`
                            INNER JOIN jobs_joblistings ON jobs_joblistings.`job_id`=applications_applications.`job_id`
                            WHERE applications_applications.`job_id`= ? AND applications_applications.`deletion_status`='FALSE'
                            ORDER BY applications_applications.`application_id` DESC";
        $query = $this->db->query($sql, array($job_id));
        return $query->result();
    }

    public function getJobListingApplicationsCount() {
        $query = $this->db->query("SELECT applications_applications.`job_id`, jobs_joblistings.`job_title`, COUNT(`application_id`) AS jobListingApplicationsCount
                                    FROM `applications_applications`
                                    INNER JOIN jobs_joblistings ON jobs_joblistings.`job_id`=applications_applications.`job_id`
                                    WHERE applications_applications.`deletion_status`='FALSE'
                                    GROUP BY `job_id` ORDER BY jobListingApplicationsCount DESC");
        return $query->result();
    }

    public function getApplicationsCount() {
        $query = $this->db->query("SELECT COUNT(`application_id`) AS noOfApplications FROM `applications_applications` WHERE `deletion_status`='FALSE'");
        return $query->result();
    }

    public function getApplicationDocs($application_id) {
        $query = $this->db->get_where('applications_applicantdocs', array(
            'application_id' => $application_id,
        ));
        return $query->result();
    }
}
