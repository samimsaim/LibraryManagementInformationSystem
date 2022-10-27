<?php
class BookModel extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    function getBooks(){
    	$this->db->from('book');
    	return $this->db->get()->result();
    }
    function getBookAuthor(){
    	$this->db->from('author');
    	return $this->db->get()->result();
    }
    function getBookById($id){
        $this->db->where('book_id',$id);
        $this->db->from('book');
        return $this->db->get()->result();
    }
    function getBookTranslator(){
        $this->db->from('translator');
    	return $this->db->get()->result();	
    }
    function deleteBook($id){
        $this->db->where('book_id',$id);
        return $this->db->delete('book');
    }
    function insertBookAuthor($data){
        return $this->db->insert('book_author',$data);
    }
    function getBookPublisher(){
    	$this->db->from('publisher');
    	return $this->db->get()->result();
    }
    function getBookCategory(){
    	$this->db->from('category');
    	return $this->db->get()->result();
    }
    function getBookProcurement(){
    	$this->db->from('procurement');
    	return $this->db->get()->result();
    }
    function insertBook($data){
         $this->db->insert('book',$data);
        return $this->db->insert_id();
    }
    function insertAuhtor($data){
        return $this->db->insert('book_author',$data);
    }
    function insertTranslator($data){
        return $this->db->insert('book_translator',$data);
    }
    function updateBook($id,$data){
        $this->db->where('book_id',$id);
        return $this->db->update('book',$data);
    }
    function updateBookAuthor($id,$data){
        $this->db->where('book_id',$id);
       return $this->db->update('book_author',$data);
    }
    function updateTranslator($id,$data){
        $this->db->where('book_id',$id);
        return $this->db->update('book_translator',$data);
    }

}
?>