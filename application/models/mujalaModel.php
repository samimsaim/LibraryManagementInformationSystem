<?php
class MujalaModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getPanel(){
    	$this->db->from('writing_panel');
    	return $this->db->get()->result();
    }
    function getMaga($id){
        $this->db->where('mag_id',$id);
        $this->db->from('scientific_magazine');
        return $this->db->get()->result();
    }
    function getMag(){
        $this->db->from('scientific_magazine');
        return $this->db->get()->result();
    }
    function getExMujala(){
    	$this->db->from('external_magazine');
    	return $this->db->get()->result();
    }
    function deleteMujala($id){
        $this->db->where('mag_id',$id);
        return $this->db->delete('scientific_magazine');
    }
    function addExMujala(){
    	$type=$this->input->post('action');
        $data=array(
            'em_name'=>$this->input->post('em_name'),
            'reference'=>$this->input->post('reference'),
            'em_number'=>$this->input->post('em_number'),
            'issue_year'=>$this->input->post('issue_year'),
            );
        return $this->db->insert('external_magazine',$data);
    }
    function addMujala(){
        $type=$this->input->post('action');
        $data=array(
            'mag_no'=>$this->input->post('number'),
            'teacher_name'=>$this->input->post('techarName'),
            'faculty_id'=>$this->input->post('faculty'),
            'panel_id'=>$this->input->post('panel'),
            'issue_year'=>$this->input->post('date'),
            );
        return $this->db->insert('scientific_magazine',$data);
    }
    function deleteExMujala($id){
    	$this->db->where('em_id',$id);
    	return $this->db->delete('external_magazine');
    }
    function updateExMujala($id,$data){
        $this->db->where('em_id',$id);
        return $this->db->update('external_magazine',$data);
    }
    function getPanal(){
        $this->db->from('writing_panel');
        return $this->db->get()->result();
    }
    function addPanal(){
          $type=$this->input->post('action');
        $data=array(
            'wp_name'=>$this->input->post('name'),
            'mag_no'=>$this->input->post('number'),
            
            );
        return $this->db->insert('writing_panel',$data);
    }
    function deletePanal($id){
        $this->db->where('wp_id',$id);
        return $this->db->delete('writing_panel');
    }
    function writingPan($id){
        $this->db->where('mag_no',$id);
        $this->db->from('writing_panel');
        return $this->db->get()->result();
    }

}
?>