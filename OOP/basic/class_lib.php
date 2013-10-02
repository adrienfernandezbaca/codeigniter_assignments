<?php
class bike {

var $price;
var $max_speed;
var $miles;

function __construct($a, $b)
{
	$this->miles = 0;
	$this->price = $a;
	$this->max_speed = $b;
} 


function drive(){
	$this->miles += 10;
}

function reverse(){
	echo "Reversing </br>";
	$this->miles -= 5;
}

function displayInfo()
{
	echo 'Miles: '.$this->miles.'<br>';
	echo 'Price: '.$this->price.'<br>';
	echo 'Max speed: '.$this->max_speed.'<br>';
}


} 

 ?>