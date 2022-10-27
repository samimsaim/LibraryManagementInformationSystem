<?php
class ProcurementModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getprocurment(){
    	$this->db->from("procurement");
		return $this->db->get()->result();
    }
     function addProcurment(){
		$type=$this->input->post('action');
		$data=array(
			'procurement_name'=>$this->input->post('name'),
			'create_at'=>date('Y-m-d'),
			);
		return $this->db->insert('procurement',$data);
	}
	function deleteProcurement($id){
		$this->db->where('procurement_id',$id);
		return $this->db->delete('procurement');
	}
	function getAuthorById($id){
		$this->db->where('author_id',$id);
		$this->db->from('author');
		return $this->db->get()->result();
	}
	function updateProcurment($id,$data){
		$this->db->where('procurement_id',$id);
		return $this->db->update('procurement',$data);
	}

}
?>