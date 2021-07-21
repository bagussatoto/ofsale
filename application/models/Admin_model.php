<?php
Class Admin_model extends CI_Model {
	public function getRoleById($id)
	{
		return $this->db->get_where('user_role', ['id' => $id])->row_array();
	}

}