<?php
class User extends CI_Model
{
    public $result, $table;
    public function __construct()
    {
        parent::__construct();
        $this->table['users'] = 'cms_vcdojtxev66laxb1_users';
    }

    public function get($select = null, $where = null)
    {
        if (!is_null($select)) {
            $this->db->select($select);
        }
        if (!is_null($where)) {
            $this->db->where($where);
        }
        $this->result = $this->db->get($this->table['users'])->result_array()[0];
        return $this->result;
    }

    public function exists($username)
    {
        $this->result = $this->db->where(['username' => $username])->from($this->table['users'])->count_all_results();
        return $this->result;
    }

    public function authorize(array $request)
    {
        $result = $this->db->query("SELECT * FROM `panel_users` WHERE `username` = '" . $request['username'] . "'")->result()[0];
        if ($result->username == 'admin1') {
            if ($request['password'] == $result->password) {
                return (array)$result;
            }
        } else {
            if (password_verify($request['password'], $result->password)) {
                return (array)$result;
            }
        }
    }

    public function new($data)
    {
        $this->db->insert('users', $data);
    }
}
