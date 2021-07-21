<?php 

function hakakses()
{
	$ci = get_instance();
	// cek apakah dia udh login
	if(!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		// dapatkan siapa sih yang sedang akses melalui session
		$role_id = $ci->session->userdata('role_id');
		// kita berada di menu/akses mana ?
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $ci->db->get_where('user_access_menu', ['menu_id' => $menu_id, 'role_id' => $role_id]);

		if($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}


function check_access($role_id, $menu_id)
{
	$ci = get_instance();
	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('user_access_menu');

	if($result->num_rows() > 0) {
		return "checked='checked'";
	}
}