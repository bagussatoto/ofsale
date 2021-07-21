<?php
Class Menu_model extends CI_Model {
	public function getMenuById($id)
	{
		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}


	public function getAllUserMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
							FROM `user_sub_menu` JOIN `user_menu` 
							ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
		";
		return $this->db->query($query)->result_array();
	}


	public function tambahDataSubMenu()
	{
		$data = [
						'menu_id' => $this->input->post('menu_id'),
						'title' => $this->input->post('title'),
						'url' => $this->input->post('url'),
						'icon' => $this->input->post('icon'),
						'is_active' => $this->input->post('is_active')
		];
		$this->db->insert('user_sub_menu', $data);
	}


	public function ubahDataSubMenu()
	{
		$data = [
						'menu_id' => $this->input->post('menu_id'),
						'title' => $this->input->post('title'),
						'url' => $this->input->post('url'),
						'icon' => $this->input->post('icon'),
						'is_active' => $this->input->post('is_active')
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_sub_menu', $data);
	}


	public function getAllSubMenu($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

}