<?php

class Comment_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function create_comment($post_id){

        $data = array(
            'post_id' => $post_id,
            'name' => $this->input->post('name'),
            'email_address' => $this->input->post('email_address'),
            'body' => $this->input->post('body')
        );

        return $this->db->insert('comments', $data);

    }

    public function get_comments($id){
        
        /*
        if($id === FALSE){
            $this->db->order_by('comments.id', 'DESC');
            $this->db->join('posts', 'posts.comment_id = comment.comment_id');
            $query = $this->db->get('comments');
            return $query->result_array();
        }
        */

        $query = $this->db->get_where('comments', array('post_id' => $id));
        return $query->result_array();

    }
    
}
