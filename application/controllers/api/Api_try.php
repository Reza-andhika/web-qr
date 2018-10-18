<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api_try extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
///API Get
    function index_get() {
        $username = $this->get('username');
        if ($username == '') {
            $get = $this->db->get('coba')->result();
        } else {
            $this->db->where('username', $username);
            $get = $this->db->get('coba')->result();
        }
        $this->response($get, 200);
    }

///Api Untuk Percobaan Tidak Di Emplementasi
///API Post
    function index_post() {
        $data = array(
                    'username'           => $this->post('username'),
                    'password'          => $this->post('password'));
        $insert = $this->db->insert('coba', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('username');
        $data = array(
            'username'       => $this->put('username'),
            'status'         => $this->put('status'));
        $this->db->where('username', $id);
        $update = $this->db->update('coba', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('username');
        $this->db->where('username', $id);
        $delete = $this->db->delete('coba');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>