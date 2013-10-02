<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Register</h2>
	<?php 

		// successful registration
		if(isset($this->session->userdata['registration']))
		{
			echo '<p>'.$this->session->userdata['registration'].'</p>';
			$this->session->unset_userdata('registration');
		}

		// registration verification 
		if(isset($this->session->userdata['errors']))
		{
			foreach ($this->session->userdata['errors'] as $row) 
			{ ?>

	<p> <?= $row ;?> </p>

	<?php
			}
			$this->session->unset_userdata('errors');
		}	
	?>
	<form action="/user/process_registration" id='registration' method='post' >
		<label for='email'>Email</label>
		<input type="text" name='email'/>
		</br>
		<label for="password">Password</label>
		<input type="password" name='password'/>
		</br>
		<label for="confirm_password">Confirm password</label>
		<input type="password" name='confirm_password'/>
		</br>
		<label for="first_name">First Name</label>
		<input type="text" name='first_name'/>
		</br>
		<label for="last_name">Last Name</label>
		<input type="text" name='last_name'/>
		</br>
		<input type="submit" value='Login'/>
	</form>
	</br>
	<h2>Login</h2>

	<?php 
		if(isset($this->session->userdata['login']))
		{
			echo '<p>'.$this->session->userdata['login'].'</p>';
			$this->session->unset_userdata('login');
		}

	?>
	<form action="/user/process_login" id='login' method='post' >
		<label for='email'>Email</label>
		<input type="text" name='email'/>
		<label for="password">Password</label>
		<input type="password" name='password'/>
		<input type="submit" value='Login'/>
	</form>
	
</body>
</html>