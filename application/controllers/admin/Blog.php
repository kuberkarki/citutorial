<?php
include_once(APPPATH.'controllers/Admin_controller.php');
class blog extends Admin_controller{


	public function __construct(){
		 parent::__construct();
		 $this->load->Model('blog_model');
         $this->model = $this->blog_model;
		// $this->model=$this->load->model('blog_model');
	}
	public function index(){

		$data['title']='Blog';
		$data['posts']=$this->model->get_posts();

		$this->display('blog/index',$data);

		
	}

	public function search(){

		$data['title']='Search result';
		$data['posts']=$this->model->get_search_posts();

		$this->display('blog/index',$data);
	}

	public function create(){
		$data['title']='Create Blog';
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->display('blog/create',$data);
		}else{
			$this->model->insert_entry();
			redirect('blog');
		}

	}

	public function post($id){

		$data['post']=$this->model->get_posts($id);
		$data['title']='';
		$this->display('blog/post',$data);

	}

	public function edit($id){

		$data['post']=$this->model->get_posts($id);
		$data['title']='Edit Post';
		$this->display('blog/edit',$data);

	}

	public function update(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$id=$this->input->post('id');
		if(!isset($id)){
			show_404();
		}

		if ($this->form_validation->run() == FALSE){
			redirect('blog/edit/'.$id);
		}else{
			$this->model->update_entry();
			redirect('blog');
		}

	}

	public function delete(){
		$id=$this->input->post('id');
		if(!isset($id)){
			show_404();
		}
		$this->model->delete_entry();
		redirect('blog');

	}
}