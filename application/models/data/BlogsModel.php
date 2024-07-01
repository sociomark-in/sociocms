<?php

class BlogsModel extends CI_Model
{
	public $data;
	public $table;

	public function __construct()
	{
		parent::__construct();
		$this->table['blogs'] = 'cms_vcdojtxev66laxb1_posts';
	}

	public function get_all($columns = null, $where = null)
	{
		if (!is_null($columns)) {
			$this->db->select($columns);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$this->db->order_by('created_at', 'DESC');
		$result = $this->db->get($this->table['blogs'])->result_array();

		return json_encode($result);
	}
}
?>
