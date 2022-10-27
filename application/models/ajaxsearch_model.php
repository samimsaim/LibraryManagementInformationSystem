<?php
class Ajaxsearch_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("book");
  if($query != '')
  {
   $this->db->like('price', $query);
   $this->db->or_like('book_title', $query);
   $this->db->or_like('publisher_id', $query);
   $this->db->or_like('no_of_pages', $query);
   $this->db->or_like('edition', $query);
  }
  $this->db->order_by('book_id', 'DESC');
  return $this->db->get();
 }
}
?>