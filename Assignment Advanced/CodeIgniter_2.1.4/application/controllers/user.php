<?php 


class User extends CI_controller
{

	

	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$this->load->view('home');
	}
	
	public function signin()
	{
		$this->load->view('signin');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function new_user()
	{
		$this->load->view('new');
	}

	public function edit_view()
	{
		$this->load->view('edit');
	}

	private function dashboard_view($user)
	{
		//building the table

		$user_table = "
		<table>
		    <tr>
		      <th>Id</th>
		      <th>Name</th>
		      <th>email</th>
		      <th>created_at</th>
		      <th>user_level</th>
		      <th>actions</th>
		    </tr>";
		    
		    foreach ($user as $key) {
		   
		    $user_table .= 
		    '<tr id='.$key->id.'><td>'.$key->id.'</td>
		    <td><a href="wall?id='.$key->id.'"">'.$key->first_name.' '.$key->last_name.'</td>
		    <td>'.$key->email.'</td>
		    <td>'.$key->created_at.'</td>
		    <td>'.$key->admin_level.'</td>';

		    if($this->session->userdata['user_info']['admin_level'] == 'admin')
		    {
		    	$user_table .= 
		    	'<td>
		    	<form method="get" action="edit" style="display: inline;">
		    	<a>edit</a>
		    	<input method="post" type="hidden" name="id" value='.$key->id.' />
				</form>   
		    	<form action="delete_user" style="display: inline;">
		    	<a>delete</a>
		    	<input type="hidden" name="id" value='.$key->id.' />
				</form>
		    	</td>';
		    }
		    else
		    {

		    }
		    $user_table .= '</tr>';
			}
			$user_table .= '</table>';
		$this->session->set_userdata('user_table', $user_table);
		$this->load->view('dashboard_view');
	}

	public function wall_view()
	{
		$this->load->view('wall_view');
	}

	public function process_registration()
	{
		// form validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('passwd', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confpasswd', 'Confirm password', 'matches[password]');
		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
		if($this->form_validation->run() == false)
		{
			$errors[] = validation_errors();
			$this->session->set_userdata('errors', $errors);
			redirect(base_url('/user/register'));
		}
		// existing user validation
		else
		{		
			$user = $this->get_user();
			if (empty($user)) 
			{
				$this->set_user();
				$registered = 'You have been successfully registered !';
				$this->session->set_userdata('registration', $registered);
				redirect(base_url('/user/dashboard'));
			}
			else
			{	
				$registered = 'Email already in the database! Process to login...';
				$this->session->set_userdata('registration', $registered);
				redirect(base_url('/user/register'));	
			}
		}

	}

	public function process_login()
	{	
		$user = $this->get_user();
		if(!empty($user))
		{
			if($user->password == $this->input->post('passwd'))
			{
				// password match, we put all $user_info in an array
				foreach ($user as $key => $value) 
				{
					if ($key != 'password') 
					{
					$user_info[$key] = $value;
					}
				}
				$this->session->set_userdata('user_info', $user_info);
				redirect(base_url('/user/dashboard'));
			}
			// error in the password
			else 
			{
			$registered = 'Incorrect Password!';
			$this->session->set_userdata('registration', $registered);
			redirect(base_url('/user/signin'));
			}
		}		
		else
		{
			// email not existing
			$registered = 'Email not in the database! please proceed to registration!';
			$this->session->set_userdata('registration', $registered);
			redirect(base_url('/user/signin'));
		}
		
	}

	function dashboard()
	{	
		if(empty($this->session->userdata['user_info']))
		{
			// if session has been destroyed by logout, redirect the user to the 
			redirect(base_url('/user/signin'));
		}
		else
		{
			// charge all users from the database to load the user table
			$user = $this->get_user();
			$this->dashboard_view($user);
		}
	}


		function get_user()
		{
			// get user from the database return $user array
			$this->load->model('User_model');
			if($this->input->post() != NULL)
			{
				$user = ($this->User_model->get_user($this->input->post()));
			}
			else
			{
				$user = ($this->User_model->get_user($this->input->get()));
			}
			return $user;

		}

		function set_user()
		{	
			// set a new user.
			$this->load->model('User_model');
			$this->load->library('encrypt');

			$user_info = array( 'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'), 'password' => $this->input->post('passwd'), 'email' => $this->input->post('email'), 'admin_level' => 'normal', 'created_at' => date('Y-m-d H:i:s'));

			$this->User_model->register_new_user($user_info);
		}

		function delete_user()
		{	
			// delete an user with user id
			$user = array('id' => $this->input->get('id'));
			$this->load->model('User_model');
			$this->User_model->delete_user($user);
			redirect(base_url('user/dashboard'));
		}

		function edit()
		{
			$this->edit_view();
			$user = $this->get_user();
			$this->session->set_userdata('edit_user', $user);
		}

		function user_editing()
		{
			// Edit users thanks to the array $user
			$this->load->model('User_model');
			$user_edit = array('id' => $this->input->post('id'));

			// edit first name, last name, email
			if($this->input->post('fname') != NULL)
			{
			$user_edit = array_merge($user_edit, array('first_name' => $this->input->post('fname'), 'last_name' => $this->input->post('lname'), 'email' => $this->input->post('email')));
			}
			
			// edit password
			if($this->input->post('passwd') != NULL)
			{
				// if password and password confirmed matches
				if ($this->input->post('passwd') == $this->input->post('conpasswd'))
				{
				$user_edit = array_merge($user_edit, array('password' => $this->input->post('passwd')));
				}
				// password don't match
				else
				{
					$registered = 'Password not matching!';
					$this->session->set_userdata('registration', $registered);
					redirect(base_url('user/edit'));
				}
			}

			// edit description
			if($this->input->post('description') != NULL)
			{
				$user_edit = array_merge($user_edit, array('description' => $this->input->post('description')));
			}

			$this->User_model->edit_user($user_edit);
			redirect(base_url('user/dashboard'));
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url('user/home'));
		}


		// wall
		public function wall()
		{
			$msg = $this->get_message($this->input->get('id'));
			$comment = "";
			$wall ='';

			foreach ($msg as $key) 
			{
				$wall .= "
				<div class='well'>
					<h5>".$key->first_name." ".$key->last_name." _________".$key->created_at."</h5>
					<p>".$key->message."</p>";
					$comments = $this->get_comment($key->id);		
						if(!empty($comments))
						{
						foreach($comments as $row)
							{
								$wall .="
								<div class='comments well'>
								<h6>".$row->first_name." ".$row->last_name." _________".$row->created_at."</h6>
								<p>".$row->comment."</p>
								</div>";
							}
						}
				$wall .= "
				<form action='new_comment' method='post'>
					<input type='hidden' name='message_id' value='".$key->id."' />
					<input type='hidden' value='".$this->input->get('id')."' name='id'/>
					<textarea id='comment' class='input-xlarge' name='comment'></textarea>
					<div class='controls'>
						<button type='submit' class='btn btn-success' >Comment</button>
					</div>
				</form>
			 </div>";
			}
			$this->session->set_userdata('wall', $wall);
			$this->wall_view();
		}

		// messages
		public function new_message()
		{
			// $msg_info = array($this->input->post());
			$msg_info = array(
				'message' => $this->input->post('msg'), 
				'wall_user_id' => $this->input->post('id'),
				'sender_id' => $this->session->userdata['user_info']['id'], 
				'created_at' => date('Y-m-d H:i:s'));

			$this->load->model('User_model');
			$this->User_model->new_message($msg_info);
			$url = "user/wall?id=".$msg_info['wall_user_id'];
			redirect(base_url($url));
		}

		function get_message()
		{
			// get user from the database return $user array
			$this->load->model('User_model');

			if($this->input->post() != NULL)
			{
				$msg = ($this->User_model->get_message($this->input->post()));
			}
			else
			{
				$msg = ($this->User_model->get_message($this->input->get()));
			}
			return $msg;

		}

		// comments
		function new_comment()
		{	
			$this->load->model('User_model');
			$comment_info = array(
				'comment' => $this->input->post('comment'), 
				'message_id' => $this->input->post('message_id'),
				'sender_id' => $this->session->userdata['user_info']['id'], 
				'created_at' => date('Y-m-d H:i:s'));

			
			$this->User_model->new_comment($comment_info);
			$url = "user/wall?id=".$this->input->post('id');
			redirect(base_url($url));
		}
		function get_comment($msg)
		{
			
			$id['message_id'] = $msg;
			$this->load->model('User_model');
			$comments = $this->User_model->get_comment($id);
			return $comments;
		}



}


?>