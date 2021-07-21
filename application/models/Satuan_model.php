<?php
Class Satuan_model extends CI_Model {
	public function tambahSatuan()
	{
		$data = ['satnama' => $this->input->post('nama')];
		$this->db->insert('satuan', $data);
	}


	public function getSatuanById($id)
	{
		return $this->db->get_where('satuan', ['satid' => $id])->row_array();
	}


}