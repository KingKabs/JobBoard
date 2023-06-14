<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
        $this->load->model('Loginmodel');
    }

    public function adminloginPage() {
        $this->load->view('login_page');
    }

    //for admin login form
    public function login() {
        //This method will have the credentials validation
        $this->load->helper('security');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_page');
        } else {
            //Go to private area
            $loggedIn = $this->session->userdata('jobsportaladminlogged_in');
            if ($loggedIn !== NULL && $loggedIn['login_type'] === 'admin') {
                redirect('admin/admin_dashboard');
                //echo 'Logged In Successfully';
            } elseif ($loggedIn !== NULL && $loggedIn['login_type'] === 'frontoffice') {
                //redirect('modules/spsupreme/spsupreme/index');
            }
        }
    }

    //check password from database
    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->Loginmodel->adminLogin($username, $password);

        if ($result) {
            $access = array();
            foreach ($result as $row) {
                $access = array(
                    'user_id' => $row->id,
                    'username' => $row->username,
                    'login_type' => $row->login_type,
                );
                $this->session->set_userdata('jobsportaladminlogged_in', $access);
                //$this->session->unset_userdata('adminlogged_in');
                //var_dump($this->session->userdata('adminlogged_in'));die;
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    //function to logout a user
    public function logoutUser() {
        $loggedOut = $this->session->unset_userdata('jobsportaladminlogged_in');

        if ($loggedOut === NULL) {
            //var_dump($loggedOut);
            redirect('login/adminloginPage');
        }
    }

}
