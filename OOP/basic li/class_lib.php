<?php 


class car{

function __construct($price, $speed, $fuel = 'FULL', $mileage, $tax = 0.12){

$this->price = $price;
$this->speed = $speed;
$this->fuel = $fuel;
$this->mileage = $mileage;
$this->tax = $tax;
if ($this->price > 10000){
	$this->tax = 0.15;
}
}

function Display_all(){
echo 'Price: '.$this->price.'</br>';
echo 'Speed: '.$this->speed.'</br>';
echo 'Fuel: '.$this->fuel.'</br>';
echo 'Mileage: '.$this->mileage.'</br>';
echo 'Tax: '.$this->tax.'</br>';
}



}


 ?>