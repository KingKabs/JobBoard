<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
        $this->load->model('Adminmodel');
        $this->load->model('Applicationsmodel');
    }

    public function index() {
        $data['alljobs'] = $this->Adminmodel->getAllJobs();
        $data['content'] = 'jobs';
        $this->load->view('templates/template', $data);
    }

    public function view_job() {
        $job_id = $this->uri->segment(3);
        $data['job_id'] = $job_id;
        $data['alljobs'] = $this->Adminmodel->getJobWithId($job_id);
        $data['jobtests'] = $this->Adminmodel->getJobTestsWithJobId($job_id);
        $data['jobTestsTotalDuration'] = $this->Adminmodel->getJobTestTotalDuration($job_id)[0]->test_duration;
        $data['content'] = 'view_job';
        $this->load->view('templates/template', $data);
    }

    public function job_interviews() {
        $job_id = $this->uri->segment(3);
        $application_id = $this->uri->segment(4);
        $data['job_id'] = $job_id;
        $data['application_id'] = $application_id;
        $data['alljobs'] = $this->Adminmodel->getJobWithId($job_id);
        $data['jobtests'] = $this->Adminmodel->getJobTestsWithJobId($job_id);
        $data['content'] = 'job_interviews';
        $this->load->view('templates/template', $data);
    }

    public function take_interview() {
        $job_id = $this->uri->segment(3);
        $application_id = $this->uri->segment(4);
        $test_id = $this->uri->segment(5);
        $data['job_id'] = $job_id;
        $data['application_id'] = $application_id;
        $data['test_id'] = $test_id;
        $data['alljobs'] = $this->Adminmodel->getJobWithId($job_id);
        $data['jobtest'] = $this->Adminmodel->getJobTestWithId($test_id);
        $data['jobtestquestions'] = $this->Adminmodel->getJobTestQuestions($test_id);
        $data['jobtestresults'] = $this->Applicationsmodel->getJobTestsResultsWithApplicantionId($application_id, $test_id);
        $data['content'] = 'take_interview';
        $this->load->view('templates/template', $data);
    }

    public function process_results() {
        $job_id = $this->uri->segment(3);
        $application_id = $this->uri->segment(4);
        $test_id = $this->uri->segment(5);
        $data['job_id'] = $job_id;
        $data['application_id'] = $application_id;
        $data['test_id'] = $test_id;
        $data['alljobs'] = $this->Adminmodel->getJobWithId($job_id);
        $data['jobtests'] = $this->Adminmodel->getJobTestWithId($test_id);
        $data['jobtestquestions'] = $this->Adminmodel->getJobTestQuestions($test_id);
        $data['jobtestresults'] = $this->Applicationsmodel->getJobTestsResultsWithApplicantionId($application_id, $test_id);
        $data['content'] = 'process_results';
        $this->load->view('templates/template', $data);
    }

    public function sendApplication() {

        $this->form_validation->set_rules('fname', 'fname', 'required');
        $this->form_validation->set_rules('lname', 'lname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('idno', 'idno', 'required');

        if ($this->form_validation->run()) {
            $job_id = $this->uri->segment(3);
            $emailToSearch = $this->input->post('email');
            $noOfResults = $this->Applicationsmodel->checkIfUserApplicationExists($emailToSearch, $job_id);
            if ($noOfResults === 0) {
                $application_id = $this->Applicationsmodel->addApplication($job_id);
                redirect('main/job_interviews/' . $job_id . "/" . $application_id . "/");
            } else {
                echo "You have already applied for this position.";
            }
        } else {
            echo 'There was a problem sending your application, please try again later';
        }
    }

    public function addInterviewTestSubmission() {

        $this->form_validation->set_rules('interview_question_answer', 'interview_question_answer', 'required');

        if ($this->form_validation->run()) {
            $application_id = $this->uri->segment(3);
            $test_id = $this->uri->segment(4);
            $question_id = $this->uri->segment(5);
            $submitted_answer = $this->uri->segment(6);
            $interview_question_answer = $this->input->post('interview_question_answer');

            $question_details = $this->Adminmodel->getJobTestQuestionWithId($question_id);
            $correct_answer = $question_details[0]->answer;
            $correct_answer_score = $question_details[0]->score;
            if ($submitted_answer === $correct_answer) {
                $pass = "PASS";
                $score = $correct_answer_score;
            } else {
                $pass = "FAIL";
                $score = 0;
            }

            $noOfResults = $this->Applicationsmodel->checkIfInterviewTestSubmissionItemExists($application_id, $question_id);
            if ($noOfResults === 0) {
                $this->Applicationsmodel->addInterviewTestSubmission($application_id, $test_id, $question_id, $submitted_answer, $correct_answer, $pass, $score);
                echo 'answer submitted successfully.';
            } else {
                $this->Applicationsmodel->updateInterviewTestSubmissionItem($application_id, $question_id, $submitted_answer, $correct_answer, $pass, $score);
                echo 'answer updated successfully.';
            }
        } else {
            echo 'There was a problem submitting the answer, please try again later';
        }
    }
}
