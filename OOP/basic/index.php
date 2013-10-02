<?php include('class_lib.php'); 

$bike1 = new bike("200", "25mph");
$bike1->drive();
$bike1->drive();
$bike1->drive();
$bike1->reverse();
$bike1->displayInfo();


?>