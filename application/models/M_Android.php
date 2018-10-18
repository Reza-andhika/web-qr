<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Android extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($username, $password)
    {
        $result = $this->db->query("SELECT * FROM coba WHERE username = '$username' AND PASSWORD = '$password'");
        
        return $result->result();
    }

    public function try_update($data) {
        $this->db->where('username',$data['username']);
        return $this->db->update('coba', $data); 
    }

    public function encrypt_S($enc){
        $result = $this->db->query("SELECT * FROM coba WHERE encrypt = '$enc'");
    }
    
    public function updatelagi($data, $username)
    {
    $val = array(
      'username' => $data['username'],
      'password' => $data['password'],
      'status' => $data['status']);
    $this->db->where('username', $username);
    $this->db->update('coba', $val);
    }
}