<?php 
include_once('connection.php');
session_start();


class Process
{

	var $connection;

	public function __construct()
	{
		$this->connection = new Database('friends');

		if(isset($_POST['registration']))
		{
			$this->registrationAction();
		}

		if(isset($_POST['login']))
		{
			$this->loginAction();
		}
	
	}

	function registrationAction()
	{
		if(empty($_POST['first_name']))
		{
			$errors[] = "First namecan't be empty!";
		}
		if(empty($_POST['last_name']))
		{
			$errors[] = "Last name can't be empty!";
		}
		if(empty($_POST['email']))
		{
			$errors[] = "Email can't be empty!";
		}
		else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
			$errors[] = "Invalid email";
		}

		if(!isset($errors))
		{
			$query = "SELECT * FROM users WHERE email = '{$_POST['email']}';";
			$results = $this->connection->fetch_all($query);

			if(empty($results))
			{
			$_SESSION['successful_registration'] = "You have successfully registrated !";
			$query = "INSERT INTO `friends`.`users` (`first_name`, `last_name`, `email`, `password`, `created_at`) VALUES ('".mysql_real_escape_string($_POST['first_name'])."', '".mysql_real_escape_string($_POST['last_name'])."', '{$_POST['email']}', '".md5($_POST['password'])."', NOW());";
			mysql_query($query);
			header('Location: index.php');
			}
			else
			{
			$_SESSION['successful_registration'] = "Email already registered!";
			header('Location: index.php');
			}

		}
		else 
		{
			$_SESSION['errors'] = $errors;
			header('Location: index.php');
		}
	}

	function loginAction()
	{

		if((!empty($_POST['login_email'])) AND (!empty($_POST['login_password'])))
		{
			$query = "SELECT * FROM users WHERE email = '".mysql_real_escape_string($_POST['login_email'])."' AND password ='".md5($_POST['login_password'])."';";

			$results = $this->connection->fetch_all($query);
			
			if(empty($results))
			{
				$_SESSION['login'] = 'error in the password or email';
				header('Location: index.php');
			}
			else 
			{
				$_SESSION['user'] = $results;
				header('Location: home.php');
			}
		}
		else 
		{
			$_SESSION['login'] = 'error in the password or email';
			header('Location: index.php');
		}

		
	}



}
$countries = new Process();






	

?>
