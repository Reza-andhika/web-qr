<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_name');
    }

	//fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function getqr($keyword)
    {
        $this->db->where('username',$keyword);
        $query  =   $this->db->get('coba');
        return $query;
    }
    function check_status($username,$nomer)
    {// fungsi cek data via db
        $this->db->select('*');
        $this->db->from('coba');
        $this->db->where($username);
        $this->db->where($nomer);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function update_status($username,$data)
    {
        $this->db->where('username',$username);
        $this->db->update('coba',$data);
    }
}