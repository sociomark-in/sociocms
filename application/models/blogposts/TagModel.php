<?php

class TagModel extends CI_Model
{
    public $table;
    public function __construct()
    {
        parent::__construct();
        $this->table['tags'] = "app_post_tags"; 
    }

    public function get($select = null, $where = null)
    {
        if (!is_null($select)) {
            $this->db->select($select);
        }

        if (!is_null($where)) {
            $this->db->where($where);
        }

        return $this->db->get($this->table['tags'])->result_array();
    }
    public function insert($data)
    {
        if ($this->db->insert($this->table['tags'], $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($where, $data)
    {
        if (!is_null($where) && !is_null($data)) {
            return $this->db->update($this->table['tags'], $data, $where);
        }
    }

    public function delete($where)
    {

        $this->db->where($where);
        if ($this->db->delete($this->table['tags'])) {
            return true;
        } else{
            return false;
        }
    }
}
