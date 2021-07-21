<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		hakakses();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'My Dashboard';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function edit()
	{
		$data['judul'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('themeplates/footer');
		} else {
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');

			// cek gambar
			$upload_foto = $_FILES['foto']['name'];
			// var_dump($upload_foto); die;

			if($upload_foto) {
				$config['upload_path'] = './assets/img/profile';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					// replace/ganti gambar
					$gambar_lama = $data['user']['foto'];
					if($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
					}

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('foto', $gambar_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('tb_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit profile berhasil!</div>');
				redirect('user');
		}
	}


	public function changepassword()
	{
		$data['judul'] = 'Ganti Password';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Ulangi Password', 'required|trim|min_length[3]|matches[password_baru1]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('themeplates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if(!password_verify($password_lama, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Lama yang anda masukan salah!</div>');
				redirect('user/changepassword');
			} else {
				// cek password baru sama gak dengan password lama, karna tidak boleh sama, pecuma aja ganti passwordnya dong.
				if($password_lama == $password_baru) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal mengganti password, password lama sama dengan password baru!</div>');
					redirect('user/changepassword');
				} else {
					// kalau passwordnya beda
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tb_user');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diganti!</div>');
					redirect('user/changepassword');
				}
			}
		}
	}


}