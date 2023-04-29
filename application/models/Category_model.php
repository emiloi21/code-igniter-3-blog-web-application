<?php

class Category_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_categories($category_id = FALSE){
        
        if($category_id === FALSE){
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        $query = $this->db->get_where('categories', array('category_id' => $category_id));
        return $query->row_array();

    }

    public function create_category(){
        
        $data = array(
            'name' => $this->input->post('name'),
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('categories', $data);
        
    }

    public function delete_category($category_id){

        $this->db->where('category_id', $category_id);
        $this->db->delete('categories');
        return TRUE;

    }

    public function update_category(){
        
        $data = array(
            'name' => $this->input->post('name')
        );

        $this->db->where('category_id', $this->input->post('category_id'));
        return $this->db->update('categories', $data);

    }

    
    public function get_category($category_id){
        
        $query = $this->db->get_where('categories', array('category_id' => $category_id));
        return $query->row();

    }
    

}
