<?php
Class Konsumen_model extends CI_Model {
	public function getKonsumen($limit, $start, $keyword = null) 
	{
		if($keyword) {
			$this->db->like('konnama', $keyword);
		}
		return $this->db->get('konsumen', $limit, $start)->result_array();
	}

	// menghitung jumlah semua data di tabel
	public function countAllKonsumen()
	{
		return $this->db->get('konsumen')->num_rows();
	}


	public function cekKodeKonsumen()
	{
		$query = $this->db->query("SELECT MAX(konkode) as kodekonsumen FROM konsumen");
		$hasil = $query->row();
		return $hasil->kodekonsumen;
	}


	public function getKonsumenById($id) 
	{
		return $this->db->get_where('konsumen', ['konkode' => $id])->row_array();
	}


	public function tambahDataKonsumen()
	{
		$data = [
					'konkode' => $this->input->post('kode', true),
					'konnama' => $this->input->post('nama', true),
					'konalamat' => $this->input->post('alamat', true),
					'konnotelp' => $this->input->post('telp', true),
		];
		$this->db->insert('konsumen', $data);
	}


	public function editDataKonsumen()
	{
		$id = $this->input->post('id');
		$data = [
					'konkode' => $this->input->post('kode', true),
					'konnama' => $this->input->post('nama', true),
					'konalamat' => $this->input->post('alamat', true),
					'konnotelp' => $this->input->post('telp', true),
		];
		$this->db->where('konkode', $id);
		$this->db->update('konsumen', $data);
	}
}