<?php
class Blog_model extends CI_Model{


	public $title;
        public $body;
        // public $date;

        public function get_posts($id=FALSE){
        	if($id){
        		$this->db->where('id',$id);
				$query = $this->db->get('blog');
				return $query->row();
        	}
			$this->db->order_by('id','DESC');
			$query = $this->db->get('blog');
	        return $query->result();
	}


	public function get_search_posts(){
		$search=$this->input->post('qry');

		$this->db->like('title',$search);
		$this->db->or_like('body',$search);

		$this->db->order_by('id','DESC');
		$query = $this->db->get('blog');
        return $query->result();
	}


        public function get_last_ten_entries()
        {
                $query = $this->db->get('blog', 10);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title = $_POST['title']; // please read the below note
                $this->body  = $_POST['body'];
                // $this->date     = time();

                $this->db->insert('blog', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->body  = $_POST['body'];
                // $this->date     = time();

                $this->db->update('blog', $this, array('id' => $_POST['id']));
        }
        public function delete_entry()
        {
                $this->title    = $_POST['title'];
                $this->body  = $_POST['body'];
                // $this->date     = time();
                $this->db->where('id',$this->input->post('id'));
                $this->db->delete('blog');
        }
}