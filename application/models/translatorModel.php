<?php
class TranslatorModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getTranslator(){
    	$this->db->from("translator");
		return $this->db->get()->result();
    }
     function addTranslator(){
		$type=$this->input->post('action');
		$data=array(
			'translator_name'=>$this->input->post('name'),
			'create_at'=>date('Y-m-d'),
			);
		return $this->db->insert('translator',$data);
	}
	function deleteTranslator($id){
		$this->db->where('translator_id',$id);
		return $this->db->delete('translator');
	}
	function getAuthorById($id){
		$this->db->where('author_id',$id);
		$this->db->from('author');
		return $this->db->get()->result();
	}
	function updatetranslator($id,$data){
		$this->db->where('translator_id',$id);
		return $this->db->update('translator',$data);
	}

}
?>