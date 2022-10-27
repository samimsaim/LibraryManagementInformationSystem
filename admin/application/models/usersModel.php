<?php
/**
*
*/
class UsersModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}
function updateAprove($id,$data){
		$this->db->where('user_id',$id);
		return $this->db->update('users',$data);
	}
	public function getUser(){
		$this->db->from("users");
		return $this->db->get()->result();
	}

	public function getPrivilege(){
		$this->db->from('pervilage');
		return $this->db->get()->result();
	}

	public function insertUser($data){
        return $this->db->insert("users",$data);
	}

    function search_user($userId){
        $query = $this->db->query("SELECT * FROM users WHERE user_id=$userId");
        return $query->result();
    }

	public function addPrivilege(){
		$type=$this->input->post('action');
		$data=array(
			'pervilage_name'=>$this->input->post('name'),
			'create_roll'=>0,
			'read_roll'=>0,
			'update_roll'=>0,
			'delete_roll'=>0,
			);
		foreach ($type as $row) {
			if ($row == "create") {
				$data["create_roll"] = 1;
			}
			if ($row == "read") {
				$data["read_roll"] = 1;
			}
			if ($row == "update") {
				$data["update_roll"] = 1;
			}
			if ($row == "delete") {
				$data["delete_roll"] = 1;
			}
		}
		$query=$this->db->insert('pervilage',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function get_user($id){
		$this->db->where('user_id',$id);
		$this->db->from('users');
		return $this->db->get()->result();
	}

	public function update_user($data,$id){
		$this->db->where('user_id',$id);
		return $this->db->update('users',$data);
	}

	public function delete_user($id){
		$this->db->where('user_id', $id);
		 return $this->db->delete('users');
	}

	public function get_privelage($id){
		$this->db->where('privilege_id',$id);
		$this->db->from('pervilage');
		return $this->db->get()->result();
	}

	public function editPrivilege($id){
		$type=$this->input->post('action');
		$data=array(
			'create_roll'=>0,
			'read_roll'=>0,
			'update_roll'=>0,
			'delete_roll'=>0,
			);
		foreach ($type as $type) {
			$data[$type."_roll"]=1;
		}
		$this->db->where('privilege_id',$id);
		$query=$this->db->update('pervilage',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function deletePrivilege($id){
		$this->db->where('pervilage_id',$id);
		return $this->db->delete('pervilage');
	}

}
?>
