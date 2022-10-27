<?php
class PublisherModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getPublisher(){
    	$this->db->from("publisher");
		return $this->db->get()->result();
    }
     function addPublisher(){
		$type=$this->input->post('action');
		$data=array(
			'publisher_name'=>$this->input->post('name'),
			'publisher_address'=>$this->input->post('publisher_address'),
			'create_at'=>date('Y-m-d'),
			);
		return $this->db->insert('publisher',$data);
	}
	function deletePublisher($id){
		$this->db->where('publisher_id',$id);
		return $this->db->delete('publisher');
	}
	function getAuthorById($id){
		$this->db->where('author_id',$id);
		$this->db->from('author');
		return $this->db->get()->result();
	}
	function updatePublisher($id,$data){
		$this->db->where('publisher_id',$id);
		return $this->db->update('publisher',$data);
	}

}
?>