<?php 
Class Barang_model extends CI_Model {
	public function cekKodeBarang()
	{
		$query = $this->db->query("SELECT MAX(kode_brg) as kodebarang FROM barang");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function getBarangById($id)
	{
		return $this->db->get_where('barang', ['kode_brg' => $id])->row_array();
	}


	public function join3Tabel()
	{
		$query = "SELECT * FROM barang JOIN kategori ON barang.id_kategori = kategori.katid JOIN satuan ON barang.id_satuan = satuan.satid";
		return $this->db->query($query)->result_array();
	}


	public function tambahBarang()
	{
		$data = [
					'kode_brg' => $this->input->post('kode'),
					'nama_brg' => $this->input->post('nama'),
					'id_kategori' => $this->input->post('kategori'),
					'id_satuan' => $this->input->post('satuan'),
					'hrgjual' => $this->input->post('hrg_jual'),
					'hrgbeli' => $this->input->post('hrg_beli')
		];
		$this->db->insert('barang', $data);
	}


	public function editBarang()
	{
		$id = $this->input->post('id');
		$data = [
					'kode_brg' => $this->input->post('kode'),
					'nama_brg' => $this->input->post('nama'),
					'id_kategori' => $this->input->post('kategori'),
					'id_satuan' => $this->input->post('satuan'),
					'hrgjual' => $this->input->post('hrg_jual'),
					'hrgbeli' => $this->input->post('hrg_beli')
		];
		$this->db->where('kode_brg', $id);
		$this->db->update('barang', $data);
	}

}