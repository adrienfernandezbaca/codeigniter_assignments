<?php 

Class User_model extends CI_Model
{

	//  User
	public function get_user($user)
	{
		if (isset($user['id']))
		{
		return$this->db->where('id', $user['id'])
						->get('users')
						->result();
		}
		else if (isset($user['email']))
		{
		return$this->db->where('email', $user['email'])
						->get('users')
						->row();
		}
		else
		{
		return $this->db->get('users')
						->result();
		}
	}	

	public function register_new_user($user)
	{
		$this->db->insert('users', $user);
	}

	public function delete_user($user)
	{
		$this->db->delete('users', $user);
	}

	public function edit_user($user)
	{
		$this->db->where('id', $user['id'])
				 ->update('users', $user);
	}

	// message
	public function new_message($msg)
	{
		$this->db->insert('messages', $msg);
	}

	public function get_message($msg)
	{
		return$this->db->where('wall_user_id', $msg['id'])
					   ->join('messages', 'messages.sender_id = users.id', 'left')
					   ->order_by("messages.created_at", "desc")
					   ->get('users')
					   ->result();
	}

	// comment
	public function new_comment($comment)
	{
		$this->db->insert('comments', $comment);
	}

	public function get_comment($msg)
	{
		return$this->db->where('message_id', $msg['message_id'])
		 			   ->join('users', 'comments.sender_id = users.id', 'left')
		 			   ->order_by("comments.created_at", "desc")
					   ->get('comments')
					   ->result();

	}

}


// eof
 // active record