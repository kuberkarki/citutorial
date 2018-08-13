<?php 
class blog extends CI_Controller{


	public function __construct(){
		 parent::__construct();
		 $this->load->Model('blog_model');
         $this->model = $this->blog_model;
		// $this->model=$this->load->model('blog_model');
	}
	public function index(){

		$data['title']='Blog';
		$data['posts']=$this->model->get_posts();

		$this->load->view('template/header');
		$this->load->view('blog/index',$data);
		// echo "Hi I'm blog";
		$this->load->view('template/footer');
	}

	public function search(){

		$data['title']='Search result';
		$data['posts']=$this->model->get_search_posts();

		$this->load->view('template/header');
		$this->load->view('blog/index',$data);
		// echo "Hi I'm blog";
		$this->load->view('template/footer');
	}

	public function create(){
		$data['title']='Create Blog';
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == FALSE){
			// echo "thestres";exit;
			$this->load->view('template/header');
			$this->load->view('blog/create',$data);
			// echo "Hi I'm blog";
			$this->load->view('template/footer');
		}else{
			$this->model->insert_entry();
			redirect('blog');
		}

	}

	public function post($id){

		$data['post']=$this->model->get_posts($id);
		$data['title']='';
		$this->load->view('template/header');
		$this->load->view('blog/post',$data);
		// echo "Hi I'm blog";
		$this->load->view('template/footer');

	}

	public function edit($id){

		$data['post']=$this->model->get_posts($id);
		$data['title']='Edit Post';
		$this->load->view('template/header');
		$this->load->view('blog/edit',$data);
		// echo "Hi I'm blog";
		$this->load->view('template/footer');

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