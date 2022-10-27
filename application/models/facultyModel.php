<?php 

class FacultyModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function facultyList(){
		$this->db->from('faculty');
		return $this->db->get()->result();
	}
     function addFaculty(){
        $type=$this->input->post('action');
        $data=array(
            'faculty_name'=>$this->input->post('name'),
            'create_at'=>date('Y-m-d'),
            );
        return $this->db->insert('faculty',$data);
    }
    function addDepartment(){
      $type=$this->input->post('action');
        $data=array(
            'department_name'=>$this->input->post('name'),
            'faculty_id'=>$this->input->post('faculty'),
            'create_at'=>date('Y-m-d'),
            );
        return $this->db->insert('department',$data);  
    }
	function departmentList(){
		$this->db->from('department');
		return $this->db->get()->result();
	}

    function deleteDepartment($depId){
        $this->db->where('department_id',$depId);
        return $this->db->delete('department');
    }

    function checkHasDep($facId){
        $this->db->select("dep_id");
        $this->db->where("fac_id",$facId);
        $this->db->from("faculty");
        return $this->db->get()->num_rows();
    }

    function deleteFacultyDeps($facId){
        $this->db->where('fac_id',$facId);
        return $this->db->delete('department');
    }

    function deleteFaculty($facId){
        $this->db->where('fac_id',$facId);
        return $this->db->delete('faculty');
    }

}

?>