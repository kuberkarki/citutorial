<?php
include_once(APPPATH.'controllers/Frontend_controller.php');
class Login extends Frontend_controller{


	public function __construct(){
		 parent::__construct();
		 $this->load->Model('user_model');
         $this->model = $this->user_model;
		// $this->model=$this->load->model('blog_model');
	}
	

	public function index(){
		$data['title']='Login';
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('login',$data);
		}else{
			$ret=$this->model->checklogin();
			if($ret){
				$this->session->set_userdata('username',$this->input->post('username'));
				redirect('admin/blog');
			}
			else{
				$this->session->set_flashdata('error','Login error!!!');
				redirect('login');
			}
		}

	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('error','Logged out successfully');
		redirect('login');
	}


}