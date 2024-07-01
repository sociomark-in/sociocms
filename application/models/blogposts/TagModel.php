<?php

class TagModel extends CI_Model
{
    public $table;
    public function __construct()
    {
        parent::__construct();
        $this->table['tags'] = "cms_vcdojtxev66laxb1_tags"; 
    }

    public function get($select = null, $where = null){
        if(!is_null($select)){
            $this->db->select($select);
        }
        
        if(!is_null($where)){
            $this->db->where($where);
        }
        return $this->db->get($this->table['tags'])->result_array();
    }

    public function insert($data){
        if($this->db->insert($this->table['tags'], $data)){
            return true;
        } else{
            return false;
        }
    }
}
