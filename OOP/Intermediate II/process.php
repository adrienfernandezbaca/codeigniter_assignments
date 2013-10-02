<?php 
include_once('connection.php');
session_start();


class Process
{

var $connection;
public $country_information;

	public function __construct()
	{
		$this->connection = new Database('world');

		if(isset($_POST['country']))
		{
			$this->get_country_information($_POST['country']);
		}
	}


	function get_countries()
	{
		$query = "SELECT Name FROM Country;";
		$countries = $this->connection->fetch_all($query);
		return $countries;
	}

	function get_country_information($country_name)
	{
		$query = "SELECT * FROM Country WHERE Name = '{$country_name}';";
		$country_information = $this->connection->fetch_all($query);
		$_SESSION['country_information'] = $country_information;
		header('Location: index.php');
		}
}
$countries = new Process();






	

?>
