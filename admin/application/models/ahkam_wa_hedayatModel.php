<?php
class ahkam_wa_hedayatModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function getAhkam_wa_hedayat(){
        $this->db->from("ahkam_wa_hedayat");
        return $this->db->get()->result();
    }
    function getShumara_maktob(){
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }

    function getMursal(){
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }
    function getMursal_elai(){
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }
    function getMulahezat(){
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }
    function getTahrerat(){
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }
    function getHukom_id(){
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }
    function getAhkamById($id){
        $this->db->where('hukom_id',$id);
        $this->db->from('ahkam_wa_hedayat');
        return $this->db->get()->result();
    }

    function insertHukm($data){
        return $this->db->insert('ahkam_wa_hedayat',$data);
    }
    function deleteAhkam($id){
        $this->db->where('hukom_id',$id);
        return $this->db->delete('ahkam_wa_hedayat');
    }
    function EditHukm($id,$data){
        $this->db->where('hukom_id',$id);
        return $this->db->update('ahkam_wa_hedayat',$data);
    }

}
?>
