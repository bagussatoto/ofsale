<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		hakakses();
		$this->load->library('form_validation');
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['judul'] = 'Menu Management';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('themeplates/footer');
	}

	public function tambahmenu()
	{
		$data['judul'] = 'Tambah Data Menu';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('menu/tambahmenu', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('flashdata', 'ditambahkan');
			redirect('menu');
		}
	}


	public function editmenu($id) 
	{
		$data['judul'] = 'Ubah Data Menu';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->Menu_model->getMenuById($id);

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('menu/ubahmenu', $data);
			$this->load->view('themeplates/footer');
		} else {
			$id = $this->input->post('id');
			$menu = $this->input->post('menu');
			$this->db->set('menu', $menu);
			$this->db->where('id', $id);
			$this->db->update('user_menu');
			$this->session->set_flashdata('flashdata', 'diubah');
			redirect('menu');
		}
	}


	public function hapusmenu($id)
	{
		$this->db->delete('user_menu', ['id' => $id]);
		$this->session->set_flashdata('flashdata', 'dihapus');
		redirect('menu');
	}


	// ------------------------SUBMENU---------------------

	public function submenu()
	{
		$data['judul'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$data['submenu'] = $this->Menu_model->getAllUserMenu();
		$data['menu'] = $this->db->get('user_sub_menu')->result_array();

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambahsubmenu()
	{
		$data['judul'] = 'Tambah SubMenu Management';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('url', 'Url', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('menu/tambahsubmenu', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Menu_model->tambahDataSubMenu();
			$this->session->set_flashdata('flashdata', 'ditambahkan');
			redirect('menu/submenu');
		}
		
	}


	public function editsubmenu($id)
	{
		$data['judul'] = 'Ubah SubMenu Management';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->Menu_model->getAllSubMenu($id);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('url', 'Url', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('menu/ubahsubmenu', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Menu_model->ubahDataSubMenu();
			$this->session->set_flashdata('flashdata', 'diubah');
			redirect('menu/submenu');
		}
	}


	public function hapussubmenu($id)
	{
		$this->db->delete('user_sub_menu', ['id' => $id]);
		$this->session->set_flashdata('flashdata', 'dihapus');
			redirect('menu/submenu');
	}



}