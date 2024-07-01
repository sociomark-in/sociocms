<?php

class CategoryModel extends CI_Model
{
    public $table;
    public function __construct()
    {
        parent::__construct();
        $this->table['categories'] = "cms_vcdojtxev66laxb1_categories";
    }

    public function get($select = null, $where = null)
    {
        if (!is_null($select)) {
            $this->db->select($select);
        }

        if (!is_null($where)) {
            $this->db->where($where);
        }

        return $this->db->get($this->table['categories'])->result_array();
    }
    public function insert($data)
    {
        if ($this->db->insert($this->table['categories'], $data)) {
            return true;
        } else {
            return false;
        }
    }
}
