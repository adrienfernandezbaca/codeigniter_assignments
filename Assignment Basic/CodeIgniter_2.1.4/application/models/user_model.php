<?php 

Class User_model extends CI_Model
{

	public function get_user($user)
	{
		return $this->db->where('email', $user['email'])
						->get('users')
						->row();
	}
	

	public function register_new_user($user)
	{
		$this->db->insert('users', $user);
	}

}


// eof
 // active record