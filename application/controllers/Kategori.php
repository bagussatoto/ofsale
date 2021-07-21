<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Kategori';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('kategori/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambah()
	{
		$data['judul'] = 'Tambah Kategori';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('kategori/tambah', $data);
			$this->load->view('themeplates/footer');
		} else {
			$data = ['katnama' => $this->input->post('kategori', true)];
			$this->db->insert('kategori', $data);
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Kategori berhasil ditambahkan!.</div>');
			redirect('kategori');
		}
	}


	public function edit($id)
	{
		$data['judul'] = 'Edit Kategori';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['katagori'] = $this->Kategori_model->getKategoriById($id);

		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('kategori/edit', $data);
			$this->load->view('themeplates/footer');
		} else {
			$id = $this->input->post('id');
			$data = ['katnama' => $this->input->post('kategori', true)];
			$this->db->where('katid', $id);
			$this->db->update('kategori', $data);
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Kategori berhasil diedit!.</div>');
			redirect('kategori');
		}
	}


	public function hapus($id)
	{
		$this->db->delete('kategori', ['katid' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Kategori berhasil dihapus!.</div>');
			redirect('kategori');
	}

}