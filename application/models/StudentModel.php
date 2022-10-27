<?php
class StudentModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
     function getDepOfFaculty($facId){
        $this->db->where('faculty_id',$facId);
        $this->db->from('department');
        return $this->db->get()->result();
    }
    function insertStudent($data){
    	return $this->db->insert('student',$data);
    }
    function getStudent(){
        $this->db->from('student');
        return $this->db->get()->result();
    }
    function getStudentById($id){
        $this->db->where('student_id',$id);
        $this->db->from('student');
        return $this->db->get()->result();
    }
    function getFac($id){
        $this->db->where('faculty_id',$id);
        $this->db->from('faculty');
        return $this->db->get()->result();
    }
    function getDep($id){
        $this->db->where('department_id',$id);
        $this->db->from('department');
        return $this->db->get()->result();
    }
    function deleteStudent($id){
        $this->db->where('student_id',$id);
        return $this->db->delete('student');
    }
    function EditStudent($id,$data){
        $this->db->where('student_id',$id);
        return $this->db->update('student',$data);
    }
    function getOtherStudent(){
        $this->db->from('other_member');
        return $this->db->get()->result();
    }
    function addExStudent(){
        $type=$this->input->post('action');
        $data=array(
            'name'=>$this->input->post('name'),
            'f_name'=>$this->input->post('fname'),
            'phone_no'=>$this->input->post('phone'),
            'reference'=>$this->input->post('reference'),
            );
        return $this->db->insert('other_member',$data);
    }
    function deleteExStudent($id){
        $this->db->where('om_id',$id);
        return $this->db->delete('other_member');
    }
     function updateOthMem($id,$data){
        $this->db->where('om_id',$id);
        return $this->db->update('other_member',$data);
    }
}
?>