<?php

class User_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    
    public function register($enc_password){
        
        $data = array(
            'lname' => $this->input->post('lname'),
            'fname' => $this->input->post('fname'),
            'email_address' => $this->input->post('email_address'),
            'username' => $this->input->post('username'),
            'password' => $enc_password
        );

        return $this->db->insert('users', $data);
        
    }

    //CHECK IF USERNAME EXISTS
    public function check_username_exists($username){

        $query = $this->db->get_where('users', array('username' => $username));

        if(empty($query->row_array())){

            return true;

        }else{

            return false;

        }

    }

    //CHECK IF EMAIL ADDRESS EXISTS
    public function check_email_exists($email_address){

        $query = $this->db->get_where('users', array('email_address' => $email_address));

        if(empty($query->row_array())){

            return true;

        }else{

            return false;

        }

    }

    public function login($username, $enc_password){
        
        //VALIDATE
        $this->db->where('username', $username);
        $this->db->where('password', $enc_password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){

            return $result->row(0)->user_id;

        }else{

            return false;

        }
        
    }
    
}
