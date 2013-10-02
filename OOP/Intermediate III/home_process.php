<?php 
include_once('connection.php');
session_start();


foreach ($_SESSION['user'] as $row) 
{
	foreach($row as $key => $value) 
	{
	$user[$key] = $value;
	}
}


class Process
{
	

	public function __construct($user)
	{
		
		$this->connection = new Database('friends');

		if(isset($_POST['logout']))
		{
			$this->logout();
		}
		
		$this->get_friends($user);
		$this->get_users($user);	
		
		if(isset($_POST['add_friend']))
		{
			$this->add_a_friend($user);
		}

	}


	function logout()
	{
		session_destroy();
		header('Location: index.php');
	}

	function get_friends($user)
	{
		$query = "SELECT * FROM users
		LEFT JOIN friends ON users.id = friend_id
		WHERE users_id = {$user['id']};";
		$friends = $this->connection->fetch_all($query);
		$_SESSION['friends'] = $friends;
	}


	function get_users($user)
	{
		$query = "SELECT * FROM users
		LEFT JOIN friends ON users.id = friend_id
		WHERE id != {$user['id']} AND (friends.users_id IS NULL OR friends.users_id != {$user['id']});";


		$non_friends = $this->connection->fetch_all($query);
		$_SESSION['non_friends'] = $non_friends;
	}
	
	function add_a_friend($user)
	{
		$query = "INSERT INTO `friends`.`friends` (`users_id`, `friend_id`) VALUES ({$user['id']}, {$_POST['add_friend']});";
		mysql_query($query);
		$query = "INSERT INTO `friends`.`friends` (`users_id`, `friend_id`) VALUES ({$_POST['add_friend']}, {$user['id']});";
		mysql_query($query);
		header('Location: home.php');

	}




}

$process = new Process($user);


?>