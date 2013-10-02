<?php 


class User extends CI_controller
{

	


	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$this->load->view('login');
	}
	
	public function account_view($new_user)
	{
		$this->load->view('account_view', $new_user);
	}

	public function process_registration()
	{
		// form validation
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
		// existing user validation
		else
		{		
			$user = $this->get_user();
			if (empty($user)) 
			{
				$this->register_new_user();
				$registered = 'You have been successfully registered !';
				$this->session->set_userdata('registration', $registered);
				$this->load->view('login');	
			}
			else
			{	
				$registered = 'Email already in the database! Process to login...';
				$this->session->set_userdata('registration', $registered);
				$this->load->view('login');	
			}
		}

	}

	public function process_login()
	{	
		
		$this->load->model('User_model');
		$this->load->library('encrypt');
		$user = $this->User_model->get_user($this->input->post());

		
		
		if(isset($user->password))
		{
			if( $this->input->post('password') == $this->encrypt->decode($user->password))
			{	
				$message = 'Succesfully logged in';
				$this->session->set_userdata('logged_in', $message);
				$this->session->set_userdata('user', $user);
				
				$new_users = array();
				foreach ($user as $row => $value)
				{
					if($row != 'password')
					{
						$new_users['new_user'][$row] = $value;
					}
				}

				$this->account_view($new_users);
			}
			else
			{
				$logged = 'Wrong password !';
				$this->session->set_userdata('login', $logged);
				$this->load->view('login');
			}
		}
		else
		{
			$logged = "Not existing in the data base. Process to registration first !";
			$this->session->set_userdata('login', $logged);
			$this->load->view('login');
		}

	}


		function get_user()
		{
			$this->load->model('User_model');
			$user = $this->User_model->get_user($this->input->post());
			return $user;
			
		}

		function register_new_user()
		{	
			$this->load->model('User_model');
			$this->load->library('encrypt');

			$user_info = array( 'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'), 'password' => $this->input->post('password'), 'email' => $this->input->post('email'), 'created_at' => date('Y-m-d H:i:s'));

			$this->User_model->register_new_user($user_info);
		}

		public function logout()
		{
			$this->session->sess_destroy();
			// $logout = true;
			redirect(base_url());

		}




}


?>