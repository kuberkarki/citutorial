<?php
class User_model extends CI_Model{


	public $username;
        public $password;
        // public $date;

        public function checklogin(){
                $username=$this->input->post('username');
                $password=$this->input->post('password');
        	if($username && $password){
        		$this->db->where(array('email'=>$username,'password'=>md5($password)));
				$query = $this->db->get('users');
				return $query->row();
        	}else{
                        return false;
                }
			
	}
}

