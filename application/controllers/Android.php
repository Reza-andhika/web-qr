<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Android extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Android');
    }

    public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->M_Android->LoginApi($username, $password);
        if($result){
            echo json_encode($result);
        }
        else{
            echo "error not found username or password/";
            echo json_encode($result);
        }      
    }

    public function UpdateApi()
    {
     $data =array('username' =>$this->input->get_post('username'),
                  'status' =>'1' );
        $result = $this->M_Android->try_update($data);
        if($result) {
      echo json_encode($data,200);
         } else {
      $this->json_encode(array('error' => 'error :-( '),400);
        }
    }
}