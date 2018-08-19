<?php
class Admin_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('username'))
			redirect('login');
	}

	public function display($view,$data){
		$this->load->view('admin/template/header');
		$this->load->view($view,$data);
		$this->load->view('admin/template/footer');
	}

	
}
?>