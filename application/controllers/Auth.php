<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');


		if ($this->form_validation->run() == FALSE) {

			$this->load->view('auth/login');

		}else{

			$this->_login();

		}

		
	}



	private function _login()
	{
		$email 		= $this->input->post('email', true);
		$password 	= $this->input->post('password', true);

		$user = $this->db->get_where('user',['email' => $email])->row_array();


		if($user){

			// Jika user aktif
			if($user['is_active'] == 1){

				// cek password
				if(password_verify($password, $user['password'])){
					
					$data = [
						'email' => $user['email'],
						'role_id'	=> $user['role_id']
					];

					$this->session->set_userdata($data);
					redirect('user');

				}else{
					$this->session->set_flashdata('message', '<alert class="alert-danger" role="alert">Password salah!</alert>');
					redirect('auth');
				}

			}else{
				$this->session->set_flashdata('message', '<alert class="alert-danger" role="alert">Email belum Aktif</alert>');
				redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message', '<alert class="alert-danger" role="alert">Email belum Terdaftar</alert>');
			redirect('auth');
		}

	}



	public function register()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registrated!'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' 		=> 'Password dont match!',
			'min_length'	=> 'Password too short!'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/register');
		} else {
			$data = [
				'name'			=> htmlspecialchars($this->input->post('name', true)),
				'email'			=> htmlspecialchars($this->input->post('email', true)),
				'image'			=> 'default.jpg',
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'		=> 2,
				'is_active'		=> 1,
				'date_created' 	=> time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<alert class="alert-success" role="alert">Congratulation! your account has been created. Please Login !</alert>');
			redirect('auth');
		}
		
	}



	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<alert class="alert-success" role="alert">You have been logout</alert>');
			redirect('auth');
	}




}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */