<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        if($this->session->set_userdata('username') != null){
            redirect('dashboard');
        }     
    }
    public function index(){
        $this->load->view('login');
    }
    public function daftar(){
        $this->load->view('register');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $account = $this->user_model->validate_user($username, $password);
        if ($account) {
            $this->session->set_userdata('username', $account['username']);
            $this->session->set_userdata('id_user',$account['id_user']);
            redirect('dashboard');
        } else {
            //set pesan error
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('auth');
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
    public function logout(){
        $this->load->helper('file');
        $file_path =  FCPATH . 'session_id.txt';

		$value = '';

        write_file($file_path, $value);
        $this->session->set_userdata('username',null);     
        $this->session->set_userdata('id_user',null);  
        redirect('auth');
    }
}