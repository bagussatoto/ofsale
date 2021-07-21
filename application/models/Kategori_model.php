<?php 
Class Kategori_model extends CI_Model {
	public function getKategoriById($id)
	{
		return $this->db->get_where('kategori', ['katid' => $id])->row_array();
	}
}