<?php
class page extends CI_Controller{

	public function index($page='welcome'){

		$data['title']=ucfirst($page);

		if(!file_exists(APPPATH.'views/page/'.$page.'.php')){
			// echo "here";
			$page='index';
		}

		$this->load->view('template/header');
		$this->load->view('page/'.$page,$data);
		// echo "Hi I'm blog";
		$this->load->view('template/footer');

	}
	
}