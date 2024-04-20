<?php
defined("BASEPATH") OR exit('No direct script access allowed');

class M_welcome extends CI_Model {
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