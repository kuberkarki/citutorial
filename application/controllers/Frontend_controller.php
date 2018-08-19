<?php
class Frontend_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function display($view,$data){
		$this->load->view('template/header');
		$this->load->view($view,$data);
		$this->load->view('template/footer');
	}

	
}
?>