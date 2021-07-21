<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('email')) {
			redirect('user');
		}

		$data['judul'] = 'Halaman Login';
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('themeplates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		// var_dump($user); die;

		if($user) {
			if(password_verify($password, $user['password'])) {
					// siapkan data sessionnya
					$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 2) {
						redirect('user');
					} else {
						redirect('admin');
					}
				} else {
					// jika password salah
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
					redirect('auth');
				}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar, silahkan daftar dulu.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil logout.</div>');
			redirect('auth');
	}

	public function daftar()
	{
		if($this->session->userdata('email')) {
			redirect('user');
		}
		
		$data['judul'] = 'Halaman Daftar';

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
			['matches' => 'password tidak sama!',
				'min_length' => 'Password terlalu pendek!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/auth_header', $data);
			$this->load->view('auth/daftar');
			$this->load->view('themeplates/auth_footer');
		} else {
			$this->Auth_model->tambahUser();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><a href="#" class="alert-link">Akun berhasil dibuat, silahkan login.</a></div>');
			redirect('auth');
		}
	}


	public function blocked()
	{
		$this->load->view('admin/blocked');
	}


}