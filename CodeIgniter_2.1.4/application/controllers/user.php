<?php 


class User extends CI_controller
{
	public function login()
	{
		$this->load->view('login');
	}

	public function process_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else
		{
			$user = array('id' => 1, 'email' => 'a@m.com', 'login_status' => true);

			$this->session->set_userdata('user_session', $user);
			redirect(base_url('/user/profile'));
		}
	}

	public function profile()
	{
		echo "Hello";
		var_dump($this->session->userdata['user_session']);
	}

}


 ?>