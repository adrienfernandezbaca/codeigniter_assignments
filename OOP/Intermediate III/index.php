<?php 
require('process.php');
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Intermediate II</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="container">
	<div class="registration left">
		<?php 
		if(isset($_SESSION['errors'])){
			foreach ($_SESSION['errors'] as $error) {
				echo $error."</br>";
			}
		unset($_SESSION['errors']);
		}

		if(isset($_SESSION['successful_registration']))
		{
			echo $_SESSION['successful_registration'];
			unset($_SESSION['successful_registration']);
		}
		?>
		<h2>Registration</h2>
		<form action="process.php" method='post'>
			<input type="hidden" name="registration">
			<label for="first_name">First Name:</label>
			<input type="text" name='first_name'/>
			</br>
			<label for="last_name">Last Name:</label>
			<input type="text" name='last_name'/>
			</br>
			<label for="email">Email:</label>
			<input type="email" name='email'/>
			</br>
			<label for="password">Password:</label>
			<input type="password" name='password'/>
			</br>
			<input type="submit" value='Register'/>
		</form>
	</div>

	<div class="registration right">
		<?php 
			if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}
		 ?>
		<form action="process.php" method='post'>
			<input type="hidden" name="login">
			<label for="login_email">Email:</label>
			<input type="email" name='login_email'/>
			</br>
			<label for="login_password">Password:</label>
			<input type="password" name='login_password'/>
			</br>
			<input type="submit" value='Login'/>
		</form>
	</div>
</div>
</body>


</html>