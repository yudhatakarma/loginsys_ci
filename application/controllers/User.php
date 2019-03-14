<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		echo "Selamat Datang ".$data['user']['name'];
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */