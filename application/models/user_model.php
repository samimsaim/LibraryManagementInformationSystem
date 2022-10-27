<?php

class User_model extends CI_Model
{
    function retrieve_user()
    {
        $query = $this->db->query('select * from tbl_user');
        return $query->result();
    }

    function search_user($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_user WHERE ID=$id");
        return $query->result();
    }

    function insert_user($data)
    {
        return $this->db->insert('tbl_user', $data);
    }

    function update_user($data, $id)
    {
        $this->db->set($data);
        $this->db->where('ID', $id);
        return $this->db->update('tbl_user');
    }

    function delete_user($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('tbl_user');
    }

    // --------------- Pagination -------------

    public function record_count()
    {
        return $this->db->count_all("tbl_user");
    }

    public function fetch_users($limit, $start)
    {
        $sql = 'SELECT * FROM tbl_user ORDER BY ID DESC LIMIT ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
    // ========================================
}

?>