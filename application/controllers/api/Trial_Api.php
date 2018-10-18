<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Trial_Api extends REST_Controller{

// construct
  public function __construct(){
    parent::__construct();
    $this->load->model('M_Api');
  }

  public function index_put(){
   $response = $this->M_Api->update_status(
    $this->put('username'),
    $this->put('status'));
   $this->response($response);
  }

  public function index_delete(){
    $response = $this->M_Api->delete_username(
        $this->delete('username')
      );
    $this->response($response);
  }

  public function index_all_user(){
    $response = $this->M_Api->get_all_user();
    $this->response($response);
  }
  
  public function index_user_by(){
    $response = $this->M_Api->get_user_by(
        $this->post('username')
      );
    $this->response($response);
  }

  public function enc_get(){
    $response = $this->M_Api->get_enc(
        $this->post('username')
      );
    $this->response($response);
  }
/*

// method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->PersonM->all_person();
    $this->response($response);
  }

// untuk menambah person menaggunakan method post
  public function add_post(){
    $response = $this->PersonM->add_person(
        $this->post('name'),
        $this->post('address'),
        $this->post('phone')
      );
    $this->response($response);
  }

// hapus data person menggunakan method delete
  
*/
// update data person menggunakan method put

}

?>