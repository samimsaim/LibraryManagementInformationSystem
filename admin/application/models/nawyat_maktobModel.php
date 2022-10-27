<?php
class Nawyat_maktobModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function getNawyat_maktob(){
    	$this->db->from("nawyat_maktob");
		return $this->db->get()->result();
    }
    function getSadra(){
      $type="صادره";
      $this->db->where('nawyat',$type);
      $this->db->from("nawyat_maktob");
      return$this->db->get()->result();
    }
    function getSadraById($id){
      $this->db->where('ID_nawyat_maktob',$id);
      $this->db->from('makateb');
      return $this->db->get()->result();
    }
    function getWarda(){
      $type="وارده";
      $this->db->where('nawyat',$type);
      $this->db->from("nawyat_maktob");
      return$this->db->get()->result();
    }
    function getTaqebi(){
      $type="taqebi";
      $this->db->where('nawyat',$type);
      $this->db->from("nawyat_maktob");
      return$this->db->get()->result();
    }

    function getShumara_nawyat_maktob(){
    	$this->db->from("nawyat_maktob");
		return $this->db->get()->result();
    }
    function getQaid_warda(){
    	$this->db->from("nawyat_maktob");
		return $this->db->get()->result();
    }
    function getID(){
    	$this->db->from("nawyat_maktob");
		return $this->db->get()->result();
    }
     function addNawyat_maktob(){
		$type=$this->input->post('action');
		$data=array(
			'nawyat'=>$this->input->post('nawyat_maktob'),
			);
		return $this->db->insert('nawyat_maktob',$data);
	}
	function deleteNawyat_maktob($id){
		$this->db->where('ID',$id);
		return $this->db->delete('nawyat_maktob');
	}

	function getNawyat_maktobrById($id){
		$this->db->where('ID',$id);
		$this->db->from('nawyat_maktob');
		return $this->db->get()->result();
	}
	function updateNawyat_maktob($id,$data){
		$this->db->where('ID',$id);
		return $this->db->update('nawyat_maktob',$data);
	}

}
?>
