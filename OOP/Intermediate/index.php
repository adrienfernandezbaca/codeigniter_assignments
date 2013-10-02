<?php 

require('class_lib.php');

$michel = new animal("Michel", "100");
$michel->walk();
$michel->walk();
$michel->walk();
$michel->walk();
$michel->run();
$michel->displayHealth();


$michel2 = new dog("Michel2");
$michel2->walk();
$michel2->walk();
$michel2->run();
$michel2->pet();
$michel2->displayHealth();

$michel3 = new dragon("Michel3");
$michel3->walk();
$michel3->walk();
$michel3->run();
$michel3->fly();
$michel3->displayHealth();
 ?>