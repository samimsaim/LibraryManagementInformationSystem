<?php
class AuthorModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getAuthors(){
    	$this->db->from("author");
		return $this->db->get()->result();
    }
     function addAuthor(){
		$type=$this->input->post('action');
		$data=array(
			'author_name'=>$this->input->post('name'),
			'create_at'=>date('Y-m-d'),
			);
		return $this->db->insert('author',$data);
	}
	function deleteAuthor($id){
		$this->db->where('author_id',$id);
		return $this->db->delete('author');
	}
	function getAuthorById($id){
		$this->db->where('author_id',$id);
		$this->db->from('author');
		return $this->db->get()->result();
	}
	function updateAuthor($id,$data){
		$this->db->where('author_id',$id);
		return $this->db->update('author',$data);
	}

}
?>