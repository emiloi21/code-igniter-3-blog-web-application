<?php
 class Categories extends CI_Controller{

    public function index(){
            
        $data['title'] = ucfirst("all blog categories");

        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');

    }
    
    public function create(){

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title'] = "Create Category";

        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){

            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');

        }else{

            $this->category_model->create_category();

            //SET MESSAGE
            $this->session->set_flashdata('category_created', '<strong>Success!</strong> Category created.');

            redirect('categories');

        }
    }

    public function posts($category_id){
        
        $data['title'] = $this->category_model->get_category($category_id)->name;

        $data['posts'] = $this->post_model->get_posts_by_category($category_id);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function delete($category_id){

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
            
        $this->category_model->delete_category($category_id);

        //SET MESSAGE
        $this->session->set_flashdata('category_deleted', '<strong>Success!</strong> Category deleted.');

        redirect('categories');

    }

    public function edit($category_id){

        if(!$this->session->userdata('logged_in')){
            redirect('categories');
        }
        
        //CHECK USER OWN THE BLOG POST
        if($this->session->userdata('user_id') != $this->category_model->get_categories($category_id)['user_id']){

            redirect('categories');

        }

        $data['category'] = $this->category_model->get_categories($category_id);
        
        if(empty($data['category'])){
            show_404();
        }

        $data['title'] = "Edit Category";

        //Populate Blog Categories
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update(){

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title'] = "Edit Category";
        
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
            
            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');

        } else {

            $this->category_model->update_category();

            //SET MESSAGE
            $this->session->set_flashdata('category_updated', '<strong>Success!</strong> Category updated.');

            redirect('categories');
            
        }

    }

 }