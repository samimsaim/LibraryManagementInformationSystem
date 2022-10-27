<?php

class MainPageModel extends CI_Model
{

    function book(){
        $this->db->from('book');
        return $this->db->get()->result();
    }
    function getBooks(){
        $this->db->from('book');
        return $this->db->get()->result();
    }
    function getBook($id)
    {
        $this->db->where('category_id',$id);
        $this->db->from('book');
        return $this->db->get()->result();
    }
    function insertDetail($data){
        return $this->db->insert('opinion',$data);
    }
    function address(){
        $this->db->from('address');
        return $this->db->get()->result();
    }
    function aboutUs(){
        $this->db->from('users');
        return $this->db->get()->result();
    }
    public function fetch_data($limit, $start) {
        $sql = 'SELECT * FROM book ORDER BY book_id DESC LIMIT ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
     public function record_count()
    {
        return $this->db->count_all("book");
    }

}

?>