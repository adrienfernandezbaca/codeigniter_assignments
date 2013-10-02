<?php 


class User extends CI_controller
{

	public function login()
	{
		$this->load->view('login');
	}

	public function process_registration()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		$this->form_validation->set_rules('confirm_password', 'Confirm password', 'matches[password]');

		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');

		if($this->form_validation->run() == false)
		{
			$errors[] = validation_errors();
			$this->session->set_userdata('errors', $errors);
			redirect(base_url('/user/login'));

		}
		else
		{
			$this->session->set_usedata('user_details', $this->input->post());
			redirect(base_url('/model/login'));
		}

	}



}


?>