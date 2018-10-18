<?php

// extends class Model
class M_Api extends CI_Model{

// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

///get enct
public function get_enc($username){
  if(empty($enc)){
      return $this->empty_response();
    }
  else{
    $this->db->select('*');
    $this->db->from('coba');
    $this->db->like('username',$username);
    $find = $this->db->get()->result();

    if($find!=false){
      foreach ($find as $enc) {
        $encrypted=$enc->encrypt;
        $this->db->select('CAST');
        $this->db->AES_DECRYPT($encrypted,'password');
        $this->db->AS();
        $this->db->char(100);
        $this->db->from('coba');
        $this->db->where('username',$username);

        $find_encrypt= $this->db->get()->result();
        if($find_encrypt!=false){
          $response['status']=200;
          $response['error']=false;
          $response['message']='GET encrypt.';
          return $response;
        }
        else{
          $response['status']=502;
          $response['error']=true;
          $response['message']='GAGAL.';
          return $response;
        }
      }
    }
    else{
      echo "FAILURE!!!";
    }
  }
}

// update person
public function update_status($username,$status){

if(empty($username)){
      return $this->empty_response();
    }
else{
  $set = array(
        "status"=>$status);

  $this->db->set($set);
  $this->db->where('username',$username);
  $update = $this->db->update('coba');
          if($update){
               $response['status']=200;
               $response['error']=false;
               $response['message']='Data diubah.';
               return $response;
      }else{
               $response['status']=502;
               $response['error']=true;
               $response['message']='Data gagal diubah.';
               return $response;
      
    }
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

  $this->db->where('username',$username);
  $query =  $this->db->get('coba');

  if($query->result()){
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