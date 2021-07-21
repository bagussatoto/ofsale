<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Satuan_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['judul'] = 'Satuan Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['satuan'] = $this->db->get('satuan')->result_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('satuan/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambah()
	{
		$data['judul'] = 'Tambah Satuan';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('satuan/tambah', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Satuan_model->tambahSatuan();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data pemasok berhasil ditambahkan!.</div>');
			redirect('satuan');
		}
	}


	public function edit($id)
	{
		$data['judul'] = 'Tambah Satuan';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['satuan'] = $this->Satuan_model->getSatuanById($id);
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('satuan/edit', $data);
			$this->load->view('themeplates/footer');
		} else {
			$id = $this->input->post('id');
			$data = ['satnama' => $this->input->post('nama')];
			$this->db->where('satid', $id);
			$this->db->update('satuan', $data);
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data pemasok berhasil ditambahkan!.</div>');
			redirect('satuan');
		}
	}


	public function hapus($id)
	{
		$this->db->delete('satuan', ['satid' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data pemasok berhasil ditambahkan!.</div>');
			redirect('satuan');
	}


}