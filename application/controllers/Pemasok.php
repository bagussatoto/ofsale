<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasok extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pemasok_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Pemasok';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pemasok'] = $this->db->get('pemasok')->result_array();

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('pemasok/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambah()
	{
		$data['judul'] = 'Tambah Pemasok';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		// acak kode
		$dariDB = $this->Pemasok_model->cekKodePemasok();
		$noUrut = substr($dariDB, 3, 4);
		$kodePemasokSekarang = $noUrut + 1;
		$data['kode_pemasok'] = $kodePemasokSekarang;

		$this->form_validation->set_rules('kode', 'Kode', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('pemasok/tambahpemasok', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Pemasok_model->tambahPemasok();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pemasok berhasil ditambahkan!.</div>');
			redirect('pemasok');
		}
	}


	public function edit($id)
	{
		$data['judul'] = 'Edit Pemasok';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pemasok'] = $this->Pemasok_model->getPemasokById($id);

		$this->form_validation->set_rules('kode', 'Kode', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('pemasok/editpemasok', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Pemasok_model->editPemasok();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pemasok berhasil diedit!.</div>');
			redirect('pemasok');
		}
	}


	public function hapus($id)
	{
		$this->db->delete('pemasok', ['pemkode' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pemasok berhasil dihapus!.</div>');
			redirect('pemasok');
	}

}