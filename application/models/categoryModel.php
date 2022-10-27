<?php
class CategoryModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getGetegory(){
    	$this->db->from("category");
		return $this->db->get()->result();
    }
     function addCategory(){
		$type=$this->input->post('action');
		$data=array(
			'category_name'=>$this->input->post('category'),
			'create_at'=>date('Y-m-d'),
			);
		return $this->db->insert('category',$data);
	}
	function deleteCategory($id){
		$this->db->where('category_id',$id);
		return $this->db->delete('category');
	}
	function getAuthorById($id){
		$this->db->where('author_id',$id);
		$this->db->from('author');
		return $this->db->get()->result();
	}
	function updateCategory($id,$data){
		$this->db->where('category_id',$id);
		return $this->db->update('category',$data);
	}

}
?>