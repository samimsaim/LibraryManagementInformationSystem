<?php
class MakatebModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getMakateb(){
    	$this->db->from('makateb');
    	return $this->db->get()->result();
    }

    function insertMakateb($data){
        return $this->db->insert('makateb',$data);
    }
    function deleteMakateb($id){
        $this->db->where('shumara_maktob',$id);
        return $this->db->delete('makateb');
    }
    function getMakatebById($id){
        $this->db->where('shumara_maktob',$id);
        $this->db->from('makateb');
        return $this->db->get()->result();
    }

    function getMursal(){
    	$this->db->from('makateb');
    	return $this->db->get()->result();
    }
 
    function editMakateb($id,$data){
        $this->db->where('shumara_maktob',$id);
        return $this->db->update('makateb',$data);
    }


}
