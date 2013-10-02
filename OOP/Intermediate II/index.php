<?php 
require('process.php');
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Intermediate II</title>
</head>
<body>

<form action="process.php" method='post'>
	<label for="country">Select Country:</label>
	<select name="country">
		<?php 	
		$countries = $countries->get_countries();
		foreach ($countries as $row) {
			echo "<option value=".$row['Name'].">".$row['Name']."</option>";
		}
		?>
	</select>
	<input type="submit" value='Check Info'/>
</form>

<h3 style='border-bottom: 1px black solid; width: 200px;'>Country Information</h3>
<?php


if (isset($_SESSION['country_information']))
{
	foreach ($_SESSION['country_information'] as $row) {
		$country = $row;
	}
	if (isset($country))
	{
		echo "
		<p>Country: ".$country['Name']." </p>
		<p>Continent: ".$country['Continent']." </p>
		<p>Region: ".$country['Region']." </p>
		<p>Population: ".$country['Population']."</p>
		<p>Life Expectancy: ".$country['LifeExpectancy']."</p>
		<p>Government Form: ".$country['GovernmentForm']."</p>
		";
	}
}

 ?>
</body>


</html>