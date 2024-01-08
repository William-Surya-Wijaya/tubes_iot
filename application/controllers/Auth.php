<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->user_model->validate_user($username, $password)) {
            redirect('dashboard');
        } else {
            redirect('login');
        }
    }

    public function register() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->user_model->register_user($username, $password)) {
            redirect('dashboard');
        } else {
            redirect('register');
        }
    }
}