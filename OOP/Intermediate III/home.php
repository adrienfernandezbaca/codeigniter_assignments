<?php 
require('home_process.php');

if (!isset($_SESSION['user']))
{
	header('Location: index.php');
}

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>home</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/index.css">

</head>

<body>	
	<?php 
		echo "Welcome, {$user['first_name']} </br> {$user['email']}"
	 ?>
	
	<form method="post" action='home_process.php'>
		<input type="hidden" name='logout'>
		<input type="submit" value='logout'/>
	</form>
	<h3>List of Friends</h3>
	<table class='table'>
		<tr>
			<th>Name</th>
			<th>Email</th>
		</tr>
		<?php
			if(isset($_SESSION['friends']))
			{
				foreach ($_SESSION['friends'] as $row) {
					echo "
					<tr>
						<td>".$row['first_name']." ".$row['last_name']."</td>
						<td>".$row['email']."</td>
					</tr>";
				}
			}
			else
			{
			echo "
					<tr>
						<td>No friend yet</td>
						<td>No friend yet</td>
					</tr>";	
			} 
		?>
	</table>
	 <h3>List of Users Who subscribed to Friend Finder</h3>
	 	<table class='table'>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	<?php
		if(isset($_SESSION['friends']))
		{
			foreach ($_SESSION['non_friends'] as $row) {
				echo "
				<form action='home_process.php' method='post'>
					<tr>
							<td>".$row['first_name']." ".$row['last_name']."</td>
							<td>".$row['email']."</td>
							<td><input type='submit' value='add friend'/></td>
							<input type='hidden' name='add_friend' value='".$row['id']."'/>
						
					</tr>
				</form>";
			}
			foreach ($_SESSION['friends'] as $row) {
				echo "
				<tr>
					<td>".$row['first_name']." ".$row['last_name']."</td>
					<td>".$row['email']."</td>
					<td>Friends</td>
				</tr>";
			}
			unset($_SESSION['friends']);
			unset($_SESSION['non_friends']);
		}
	?>
	</table>
</body>
</html>