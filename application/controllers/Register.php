\\<?php 
class Register extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_reg'); //pemanggilan model mahasiswa
	}

	function index(){
		//$data['data']=$this->M_mhs->get_all_mhs();
		$this->load->view('register');
	}

	function simpan(){
		$username=$this->input->post('R_username');
		$pass=$this->input->post('R_password');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
		$this->load->library('encrypt');
		$this->load->library('aes',128);

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$username.'.png'; //buat name dari qr code sesuai dengan username
		$enc_data=$username;

		$this->M_reg->trial($username,$pass,$image_name,$enc_data); //simpan ke database

		///get Daata Enc
		$where = array('username' => $username);
		$check= $this->M_reg->get_enc('coba',$where)->result();
	    foreach ($check as $enc) {
	    	$params['data'] = $enc->username.'_'.$enc->encrypt; //data yang akan di jadikan QR CODE
	    }

		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		
		redirect('login'); //redirect ke mahasiswa usai simpan data
	}
}