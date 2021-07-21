<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		hakakses();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konsumen'] = $this->db->get('konsumen')->num_rows();
		$data['pemasok'] = $this->db->get('pemasok')->num_rows();
		$data['barang'] = $this->db->get('barang')->num_rows();
		$data['kategori'] = $this->db->get('kategori')->num_rows();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function role()
	{
		$data['judul'] = 'Role';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambahrole()
	{
		$data['judul'] = 'Tambah Role';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/tambahrole', $data);
			$this->load->view('themeplates/footer');
		} else {
			$role = $this->input->post('role');

			$this->db->insert('user_role', ['role' => $role]);
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Role berhasil ditambahkan!.</div>');
			redirect('admin/role');
		}
	}


	public function ubahrole($id)
	{
		$data['judul'] = 'Ubah Role';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->Admin_model->getRoleById($id);

		$this->form_validation->set_rules('role', 'Role', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/ubahrole', $data);
			$this->load->view('themeplates/footer');
		} else {
			$id = $this->input->post('id');
			$role = $this->input->post('role');

			$this->db->set('role', $role);
			$this->db->where('id', $id);
			$this->db->update('user_role');
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Role berhasil diubah!.</div>');
			redirect('admin/role');
		}
	}


	public function hapusrole($id)
	{
		$this->db->delete('user_role', ['id' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Role berhasil dihapus!.</div>');
			redirect('admin/role');
	}


	public function roleaccess($role_id)
	{
		$data['judul'] = 'Role Access';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		// mendapatkan role berdasarkan id yang di kirim melalui halaman role.php
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		// agar row admin tidak tampil
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/roleaccess', $data);
		$this->load->view('themeplates/footer');
	}


	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
					'role_id' => $role_id,
					'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Akses diganti!.</div>');
	}

}