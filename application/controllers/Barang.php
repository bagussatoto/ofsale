<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$data['judul'] = 'Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['barang'] = $this->db->get('barang')->result_array();
		$data['barang'] = $this->Barang_model->join3Tabel();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambah()
	{
		$data['judul'] = 'Tambah Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['satuan'] = $this->db->get('satuan')->result_array();

		// acak kode
		$dariDB = $this->Barang_model->cekKodeBarang();
		$noUrut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $noUrut + 1;
		$data['kdbrg'] = $kodeBarangSekarang;

		$this->form_validation->set_rules('kode', 'Kode', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		$this->form_validation->set_rules('hrg_jual', 'Harga Jual', 'required|trim');
		$this->form_validation->set_rules('hrg_beli', 'Harga Beli', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('barang/tambah', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Barang_model->tambahBarang();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Barang berhasil ditambahkan!.</div>');
			redirect('barang');
		}
	}


	public function edit($id)
	{
		$data['judul'] = 'Edit Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['satuan'] = $this->db->get('satuan')->result_array();
		$data['barang'] = $this->Barang_model->getBarangById($id);

		$this->form_validation->set_rules('kode', 'Kode', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		$this->form_validation->set_rules('hrg_jual', 'Harga Jual', 'required|trim');
		$this->form_validation->set_rules('hrg_beli', 'Harga Beli', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('barang/edit', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Barang_model->editBarang();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Barang berhasil diedit!.</div>');
			redirect('barang');
		}
	}


	public function hapus($id)
	{
		$this->db->delete('barang', ['kode_brg' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Barang berhasil dihapus!.</div>');
			redirect('barang');
	}


}