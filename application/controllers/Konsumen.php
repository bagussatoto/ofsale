<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Konsumen_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}
	public function index()
	{
		$data['judul'] = 'Konsumen';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		// Ambil data keyword yang di cari
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//PAGINATION
		// $config['total_rows'] = $this->Konsumen_model->countAllKonsumen();
		$this->db->like('konnama', $data['keyword']);
		$this->db->from('konsumen');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 5;
	
		// INISIALIZE
		$this->pagination->initialize($config);


		$data['start'] = $this->uri->segment(3);
		$data['konsumen'] = $this->Konsumen_model->getKonsumen($config['per_page'], $data['start'], $data['keyword']);
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('konsumen/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambahkonsumen()
	{
		$data['judul'] = 'Tambah Konsumen';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		// cek kode konsumen
		$dariDB = $this->Konsumen_model->cekKodeKonsumen();

		// acak kode
		$nourut = substr($dariDB, 3, 4);
		$kodeKonsumenSekarang = $nourut + 1;
		$data['kode_konsumen'] = $kodeKonsumenSekarang;

		$this->form_validation->set_rules('kode', 'Kode', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('konsumen/tambahkonsumen', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Konsumen_model->tambahDataKonsumen();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data konsumen berhasil ditambahkan.<div>');
			redirect('konsumen');
		}
	}


	public function editkon($id)
	{
		$data['judul'] = 'Edit Konsumen';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$data['konsumen'] = $this->Konsumen_model->getKonsumenById($id);
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('konsumen/editkonsumen', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Konsumen_model->editDataKonsumen();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data konsumen berhasil diedit.<div>');
			redirect('konsumen');
		}
	}


	public function delkon($id)
	{
		$this->db->delete('konsumen', ['konkode' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data konsumen berhasil dihapus.<div>');
			redirect('konsumen');
	}


}