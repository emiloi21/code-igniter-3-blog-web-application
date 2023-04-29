<?php

    class Posts extends CI_Controller{

        public function index($offset = 0){
            
            //PAGINATION CONFIG

            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3; //blog post per page
            $config['uri_segment'] = 3; //(base url)http://localhost/ciblog/ (u_s_1)posts/(u_s_2)index/(u_s_3)page#
            $config['attributes'] = array('class' => 'pagination-link');

            //INIT PAGINATION
            $this->pagination->initialize($config);

            //end pagination config

            $data['title'] = ucfirst("all blog posts");

            $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');

        }

        public function view($id = NULL){

            $data['post'] = $this->post_model->get_posts($id);

            $data['comments'] = $this->comment_model->get_comments($id);
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');

        }

        public function create(){

            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = "Create Post";
            
            //Populate Blog Categories
            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');

            } else {

                //UPLOAD IMAGE
                $config['upload_path'] = './assets/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){

                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'no_image.png';

                }else{

                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];

                }

                $this->post_model->create_post($post_image);

                //SET MESSAGE
                $this->session->set_flashdata('post_created', '<strong>Success!</strong> Blog post created.');

                redirect('posts');
                
            }

        }

        public function delete($id){
            
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->post_model->delete_post($id);

            //SET MESSAGE
            $this->session->set_flashdata('post_deleted', '<strong>Success!</strong> Blog post deleted.');

            redirect('posts');

        }

        public function edit($id){
            
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['post'] = $this->post_model->get_posts($id);

            //CHECK USER OWN THE BLOG POST
            if($this->session->userdata('user_id') != $this->post_model->get_posts($id)['user_id']){

                redirect('posts');

            }
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = "Edit Post";

            //Populate Blog Categories
            $data['categories'] = $this->post_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');

        }

        public function update(){

            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = "Edit Post";
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                
                $this->load->view('templates/header');
                $this->load->view('posts/edit', $data);
                $this->load->view('templates/footer');

            } else {

                $this->post_model->update_post();

                //SET MESSAGE
                $this->session->set_flashdata('post_updated', '<strong>Success!</strong> Blog post updated.');

                redirect('posts');
                
            }

        }
        
    }