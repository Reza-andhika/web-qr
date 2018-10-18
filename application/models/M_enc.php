<?php

// extends class Model
class M_enc extends CI_Model{

// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

// update person
public function get_enc($encrypt){

if(empty($username)){
      return $this->empty_response();
    }else{
      $enc=$this->db->query("SELECT CAST(AES_DECRYPT(encrypt,'password') AS char (100)) from coba where username='bananaa'")

  }
}

public function delete_username($username){

if($username == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "username"=>$username
      );

$this->db->where($where);
      $delete = $this->db->delete("coba");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data gagal dihapus.';
        return $response;
      }
    }

}

public function get_all_user(){
  $all = $this->db->get("coba")->result();
    $response['status']=200;
    $response['error']=false;
    $response['username']=$all;
    return $response;
}

public function get_user_by($username){

  $this->db->like('username',$username);
  $query  =   $this->db->get('coba');

  if($query){
    $response['status']=200;
    $response['error']=false;
    $response['username']=$query;
    return $response;
  }
  else{
    $response['status']=200;
    $response['error']=false;
    $response['message']="Can't find username";
    return $response;
  }
}
/*


// function untuk insert data ke tabel tb_person
  public function add_person($name,$address,$phone){

if(empty($name) || empty($address) || empty($phone)){
      return $this->empty_response();
    }else{
      $data = array(
        "name"=>$name,
        "address"=>$address,
        "phone"=>$phone
      );

$insert = $this->db->insert("tb_person", $data);

if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data person ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal ditambahkan.';
        return $response;
      }
    }

}

// mengambil semua data person
  public function all_person(){

$all = $this->db->get("tb_person")->result();
    $response['status']=200;
    $response['error']=false;
    $response['person']=$all;
    return $response;

}

// hapus data person

*/
}

?>