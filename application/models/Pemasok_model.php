<?php 
Class Pemasok_model extends CI_Model {
	public function getPemasokById($id)
	{
		return $this->db->get_where('pemasok', ['pemkode' => $id])->row_array();
	}


	public function cekKodePemasok()
	{
		$query = $this->db->query("SELECT MAX(pemkode) as kodepemasok FROM pemasok");
		$hasil = $query->row();
		return $hasil->kodepemasok;
	}


	public function tambahPemasok()
	{
		$data = [
					'pemkode' => $this->input->post('kode', true),
					'pemnama' => $this->input->post('nama', true),
					'pemalamat' => $this->input->post('alamat', true),
					'pemnotelp' => $this->input->post('telp', true)
		];
		$this->db->insert('pemasok', $data);
	}


	public function editPemasok()
	{
		$id = $this->input->post('id');
		$data = [
					'pemkode' => $this->input->post('kode', true),
					'pemnama' => $this->input->post('nama', true),
					'pemalamat' => $this->input->post('alamat', true),
					'pemnotelp' => $this->input->post('telp', true)
		];
		$this->db->where('pemkode', $id);
		$this->db->update('pemasok', $data);
	}

}