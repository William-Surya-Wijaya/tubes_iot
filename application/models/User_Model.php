<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model {
    public function validate_user($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
    
        if ($query->num_rows() > 0) {
            $user_data = $query->row_array();
            if (password_verify($password, $user_data['password'])) {
                return $user_data;
            }
        }
        return false;
    }    

    public function register_user($username, $password) {
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
        return $this->db->insert('user', $data);
    }
}