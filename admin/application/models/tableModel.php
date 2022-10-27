<?php

class Tablemodel extends CI_Model 
{
    function __construct() {
        parent::__construct();  
        
    }
    function posts()
    {   
        $query = $this->db ->get('category');
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }
   
    function posts_save($id,$fields)
    {
     $this ->db->where('category_id',$id)->update('category',$fields);
    }
}