<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        /// untuk melihat kenapa harus pake 'user_name' lihat pada controller login fungction index(),
        /// ubah pada fungsi if(checking)
        return $this->session->userdata('user_id');
    }
    
    function update_status($where,$data)
    {
        $this->db->where($where);
        $this->db->update('coba',$data);
    }
    function get_all_data(){

        $query  =   $this->db->get('coba');
        return $query;
    }
     function search($keyword)
    
    {
        $this->db->where('username',$keyword);
        $query  =   $this->db->get('coba');
        return $query;
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
}