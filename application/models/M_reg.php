<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reg extends CI_Model {
	function get_all_mhs(){
		$hasil=$this->db->get('coba');
		return $hasil;
	}
	function simpan_user($username,$pass,$image_nm,$enc){
		$encrypt = $this->db->query("SELECT AES_ENCRYPT('$enc','password')");
		$data=array(
			'username'=>$username,
			'password'=>$pass,
			'image_name'=>$image_nm,
			'encrypt'=>$encrypt,
			'status'=>'0'

		);
		$this->db->insert('coba',$data);
	}
	function dec_aes($enc,$username){
		return $this->db->query("SELECT AES_DECRYPT('$enc','password') from coba where username='$username'");
	}
	function trial($username,$pass,$image_nm,$enc){
		$result = $this->db->query("INSERT INTO coba (username,password,image_name,encrypt,decrypt,status) 
			VALUES ('$username','$pass','$image_nm',AES_ENCRYPT('$enc','password'),AES_DECRYPT(AES_ENCRYPT('$enc','password'),'password'),'0')");
	}
	function get_enc($table,$where){
		return $this->db->get_where($table,$where);
	}

	/*
	1. decrypt dulu di sini baru nanti di ubah jadi string 
	AES_DECRYPT()
	UBAH STRING 
	*/

}