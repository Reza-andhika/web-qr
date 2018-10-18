<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class CRUD extends REST_Controller {

    public function __construct($config='rest')
    {
        parent::__construct($config);
    }

    function index_put() {
        $user = $this->put('username');
        $data = array(
                    'username'       => $this->put('username'),
                    'status'      => '1');
        $this->db->where('username', $user);
        $update = $this->db->update('coba', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}