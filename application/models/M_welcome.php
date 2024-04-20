<?php
defined("BASEPATH") OR exit('No direct script access allowed');

class M_welcome extends CI_Model {
    public function read($id = FALSE){
        if ($id === FALSE){
            return $this->db->get('post')->result_array();
        }
        else{
            $query = $this->db->get_where('post',array('id' => $id));
            return $query->row();
        }
    }

    public function create($id, $filename){
        $data = [
            'id' => $id,
            'name' => $this->input->post('name', TRUE),
            'description' => $this->input->post('description', TRUE),
            'filename' => $filename
        ];

        $this->db->insert('post', $data);
    }
}