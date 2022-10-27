<?php
class BorrowModel extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    function getBorrow(){
        $this->db->from("borrow");
        return $this->db->get()->result();
    }
    function getBook(){
        $this->db->from('book');
        return $this->db->get()->result();
    }
    function getStudent(){
        $this->db->from('student');
        return $this->db->get()->result();
    }
    function getExStudent(){
        $this->db->from('other_member');
        return $this->db->get()->result();
    }
    function insertBorrow($data){
        return $this->db->insert('borrow',$data);
    }
    function deleteBorrow($id){
        $this->db->where('borrow_id',$id);
        return $this->db->delete('borrow');
    }
    function getBorrowById($id){
        $this->db->where('borrow_id',$id);
        $this->db->from('borrow');
        return $this->db->get()->result();
    }
    function editBorrow($id,$data){
        $this->db->where('borrow_id',$id);
        return $this->db->update('borrow',$data);
    }

}
?>