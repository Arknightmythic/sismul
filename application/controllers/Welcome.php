<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_welcome','model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index($id = FALSE)
	{
		if ($id === FALSE){
			$data['home_post'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else{
			$data['post'] = $this->model->read($id);
			$this-> load-> view('header');
			$this-> load-> view('post', $data);
			$this-> load-> view('footer');
		}
	}

	public function create($id=FALSE)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[30]');
		$this->form_validation->set_rules('description','Description','required');
	
		if ($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		} else{
			$id = uniqid('item', TRUE);

			$config['upload_path'] = './upload/post';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = '100000';
			$config['file_ext_tolower'] = TRUE ;
			$config['filename'] = str_replace('.','_',$id);

			$this->load->library('upload', $config);

			if (! $this->upload->do_upload('image1')){
				//$this->session->set_flashdata('error',$this->upload->display_error());
				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('welcome/index');
			}
			else{
				$filename = $this->upload->data('file_name');
				//$this->model->create($id,$filename);
				$this->model->create($id, $filename);
				redirect();
	}}}
}
