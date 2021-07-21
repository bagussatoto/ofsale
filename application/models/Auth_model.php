<?php
Class Auth_model extends CI_Model {
	public function tambahUser()
	{
		$data = [
					'email' => htmlspecialchars($this->input->post('email', true)),
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 1,
					'foto' => 'default.jpg'
		];
		$this->db->insert('tb_user', $data);
	}
}