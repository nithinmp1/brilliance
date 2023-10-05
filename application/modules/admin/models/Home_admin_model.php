<?php

class Home_admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function setWhereCondition($type, $user)
    {
        $this->db->where('created_id',$user['login_id']);
        $this->db->or_where('assigned_to',$user['login_id']);
    }

    public function access($function = null, $param = null)
    {
        return true;
    }

    function loadImage($type, $id) {
        $filename = 'upload/' . $type . '/' . $id . '.jpg';
        if (file_exists($filename)) {
            return base_url() . 'upload/' . $type . '/' . $id . '.jpg';
        }

    }
    public function loginCheck($values)
    {
        $arr = array(
            'email' => $values['username'],
            'password' => md5($values['password']),
        );
        $this->db->where($arr);
        $result = $this->db->get('users');
        $resultArray = $result->row_array();
        if ($result->num_rows() > 0) {
            $this->db->where('id', $resultArray['id']);
            $this->db->update('users', array('last_login' => time()));
        }
        return $resultArray;
    }

    public function getValueStore($key)
    {
        $query = $this->db->query("SELECT value FROM value_store WHERE thekey = ? LIMIT 1", [$key]);
        $value = $query->row_array();
        if(!$value) {
            return null;
        }
        return $value['value'];
    }
}
