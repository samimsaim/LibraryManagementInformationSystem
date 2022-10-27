<?php
class AraizModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }
   
    function getAraiz(){
    	$this->db->from('araiz');
    	return $this->db->get()->result();
    }
    function insertAraiz($data){
        return $this->db->insert('araiz',$data);
    }
    function deleteAraiz($id){
        $this->db->where('shumara_ariza',$id);
        return $this->db->delete('araiz');
    }
    function getAraizById($id){
        $this->db->where('shumara_ariza',$id);
        $this->db->from('araiz');
        return $this->db->get()->result();
    }
    function getNaweatMaktob($id){
        $this->db->where('ID',$id);
        $this->db->from('nawyat_maktob');
        return $this->db->get()->result();
    }
    function getArchive($id){
        $this->db->where('dosya_id ',$id);
        $this->db->from('dosya_archive');
        return $this->db->get()->result();
    }
    function getMaktob($id){
        $this->db->where('shumara_maktob ',$id);
        $this->db->from('makateb');
        return $this->db->get()->result(); 
    }
   
    function updateAraiz($id,$data){
        $this->db->where('shumara_ariza',$id);
        return $this->db->update('araiz',$data);
    }



}
?>
