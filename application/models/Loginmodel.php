<?php

class Loginmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function adminLogin($username, $password) {
        $this->db->select('id, username, password, login_type');
        $this->db->from('auth_users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
