<?php
 class Users extends CI_Controller{

    public function register(){
            
        $data['title'] = "Register";

        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('fname', 'Firts Name', 'required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email|callback_check_email_exists');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');

        }else{

            //ENCRYPT PASSWORD
            $enc_password = md5($this->input->post('password'));

            $this->user_model->register($enc_password);
            
            //SET MESSAGE
            $this->session->set_flashdata('user_registered', '<strong>You are now registered!</strong> Please login your account.');

            redirect('posts');
            
        }

    }

    //CHECK IF USERNAME EXISTS
    function check_username_exists($username){

        $this->form_validation->set_message('check_username_exists', 'The username is already taken. Please choose a different one.');

        if($this->user_model->check_username_exists($username)){

            return true;

        }else{

            return false;

        }

    }

    //CHECK IF EMAIL ADDRESS EXISTS
    function check_email_exists($email_address){

        $this->form_validation->set_message('check_email_exists', 'The email address is already taken. Please choose a different one.');

        if($this->user_model->check_email_exists($email_address)){

            return true;

        }else{

            return false;

        }

    }

    public function login(){
            
        $data['title'] = "Login";
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        

        if($this->form_validation->run() === FALSE){
            
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');

        }else{

            //GET USERNAME
            $username = $this->input->post('username');

            //GET & ENCRYPT PASSWORD
            $enc_password = md5($this->input->post('password'));

            //LOGIN USER
            $user_id = $this->user_model->login($username, $enc_password);

            if($user_id){

                //CREATE SESSION
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                //SET MESSAGE
                $this->session->set_flashdata('login_success', '<strong>Success!</strong> Welcome '.$username.'.');
                redirect('posts');

            }else{

                //SET MESSAGE
                $this->session->set_flashdata('login_failed', '<strong>Oops!</strong> Login is invalid.');

                redirect('users/login');

            }
            
        }

    }

    public function logout(){

        //UNSET USERDATA
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');

        //SET LOG OUT MESSAGE
        $this->session->set_flashdata('user_logout', '<strong>Success!</strong> You are now logged out.');

        redirect('users/login');
    }

    
     
 }