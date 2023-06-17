<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
        $this->checkAuth();
        $this->load->model('Adminmodel');
        $this->load->model('Applicationsmodel');
    }

    public function admin_dashboard() {
        $data['alljobs'] = $this->Adminmodel->getAllJobs();
        $data['content'] = 'admin/admin_dashboard';
        $this->load->view('templates/template_admin', $data);
    }

    public function job_applications() {
        $data['application_stats'] = $this->Applicationsmodel->getJobListingApplicationsCount();
        $data['noOfApplications'] = $this->Applicationsmodel->getApplicationsCount()[0]->noOfApplications;
        $data['applications'] = $this->Applicationsmodel->getAllApplications();
        $data['content'] = 'admin/job_applications';
        $this->load->view('templates/template_admin', $data);
    }

    public function job_listing_applications() {
        $job_id = $this->uri->segment(3);
        $data['job_id'] = $job_id;
        $data['joblisting'] = $this->Adminmodel->getJobWithId($job_id);
        $data['applications'] = $this->Applicationsmodel->getJobListingApplications($job_id);
        $data['jobtests'] = $this->Adminmodel->getJobTestsWithJobId($job_id);
        $data['jobtests_applicants'] = $this->Applicationsmodel->getJobTestsApplicants($job_id);
        $data['content'] = 'admin/job_listing_applications';
        $this->load->view('templates/template_admin', $data);
    }

    public function jobapplications_testresults() {
        $job_id = $this->uri->segment(3);
        $test_id = $this->uri->segment(4);
        $data['job_id'] = $job_id;
        $data['joblisting'] = $this->Adminmodel->getJobWithId($job_id);
        $data['applications_pass'] = $this->Applicationsmodel->getApplicantsJobTestsResultsPASS($test_id);
        $data['applications_fail'] = $this->Applicationsmodel->getApplicantsJobTestsResultsFAIL($test_id);
        $data['content'] = 'admin/jobapplications_testresults';
        $this->load->view('templates/template_admin', $data);
    }

    public function view_job_application() {
        $application_id = $this->uri->segment(3);
        $data['application_id'] = $application_id;
        $data['application'] = $this->Applicationsmodel->getJobApplicationWithId($application_id);
        $data['applicationtestresults'] = $this->Applicationsmodel->getApplicantJobTestsResults($application_id);
        $data['content'] = 'admin/view_job_application';
        $this->load->view('templates/template_admin', $data);
    }

    public function view_job() {
        $loggedIn = $this->session->userdata('jobsportaladminlogged_in');
        if ($loggedIn !== NULL) {
            $job_id = $this->uri->segment(3);
            $data['job_id'] = $job_id;
            $data['alljobs'] = $this->Adminmodel->getJobWithId($job_id);
            $data['jobtests'] = $this->Adminmodel->getJobTestsWithJobId($job_id);
            $data['content'] = 'admin/view_job';
            $this->load->view('templates/template_admin', $data);
        } else {
            redirect('login/adminloginPage');
        }
    }

    public function addJob() {

        $this->form_validation->set_rules('job_title', 'job_title', 'required');
        $this->form_validation->set_rules('opening_date', 'opening_date', 'required');
        $this->form_validation->set_rules('closing_date', 'closing_date', 'required');
        $this->form_validation->set_rules('job_summary', 'job_summary', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('instructions', 'instructions', 'required');

        if ($this->form_validation->run()) {
            $this->Adminmodel->addJob();
            echo 'job added successfully';
        } else {
            echo 'There was a problem adding the job, please try again later';
        }
    }

    public function addJobTest() {

        $this->form_validation->set_rules('test_name', 'test_name', 'required');
        $this->form_validation->set_rules('test_description', 'test_description', 'required');
        $this->form_validation->set_rules('pass_mark', 'pass_mark', 'required');
        $this->form_validation->set_rules('test_duration', 'test_duration', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run()) {
            $job_id = $this->uri->segment(3);
            $this->Adminmodel->addJobTest($job_id);
            echo 'job test added successfully';
        } else {
            echo 'There was a problem adding the job test, please try again later';
        }
    }

    public function addJobTestQuestion() {

        $this->form_validation->set_rules('test_id', 'test_id', 'required');
        $this->form_validation->set_rules('question', 'question', 'required');
        $this->form_validation->set_rules('answer_set', 'answer_set', 'required');
        $this->form_validation->set_rules('answer', 'answer', 'required');

        if ($this->form_validation->run()) {
            //format answer_set JSON
            $answer_set = $this->input->post('answer_set');
            $answer_setArray = explode("*", $answer_set);
            $answer_setJSON = json_encode($answer_setArray);
            $this->Adminmodel->addJobTestQuestion($answer_setJSON);
            echo 'job test question added successfully';
        } else {
            echo 'There was a problem adding the job test question, please try again later';
        }
    }

    function checkAuth() {
        $loggedIn = $this->session->userdata('jobsportaladminlogged_in');
        if ($loggedIn == NULL) {
            redirect('login/adminloginPage');
        }
    }
}
