<?php 

class animal
{

	var $name;
	var $health;

	function __construct($name, $health)
	{
		$this->name = $name;
		$this->health = $health;
	}

	function walk()
	{
		$this->health -= 1;
	}

	function run()
	{
		$this->health -= 5;
	}

	function displayHealth()
	{
		$html= "name: ".$this->name."</br>
		health: ".$this->health."</br>";
		echo $html;
	}

}


class dog extends animal
{

	function __construct($name, $health = 150)
	{
		$this->name = $name;
		$this->health = $health;
	}

	function pet()
	{
		$this->health += 5;
	}
}

class dragon extends animal
{

	function __construct($name, $health = 170)
	{
		$this->name = $name;
		$this->health = $health;
	}

	function fly()
	{
		$this->health += 10;
	}

	function displayHealth()
	{	
		echo "This is the dragon ! </br>";
		animal::displayHealth();
	}

}
?>
