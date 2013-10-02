<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

		// if ($this->session->userdata('logged_in') != 'Succesfully logged in' )
		// {	
		// 	redirect(base_url('/user/home'));
		// }
		// // successful registration

		if($this->session->userdata('logged_in') != 'Succesfully logged in' )
		{
			echo '<p>'.$this->session->userdata('logged_in').'</p>';
			$this->session->unset_userdata('logged_in');
		}

		echo "Welcome ".$new_user['first_name']." ".$new_user['last_name'];
	?>
	
	<div id="info" style='border: 1px solid black; width: 250px; margin-top: 40px; height: 100px;'>
		<?php
		echo "First Name: ".$new_user['first_name']."</br>";
		echo "Last Name: ".$new_user['last_name']."</br>";
		echo "Email Address: ".$new_user['email']."</br>";
		?>
	</div>

	<form action="logout" method="post">
		<input type="submit" value='logout'/>
	</form>
	
	
</body>
</html>