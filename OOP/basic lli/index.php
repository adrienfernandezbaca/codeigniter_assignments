<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>basic lli</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
</head>
<body>


<!-- print_table -->
<?php include('class_lib.php'); 
$a = array(array('key' => 'value'), array('key2' => 'value2'), array('key3' => 'value3'), array('key4' => 'value4'));
$table = new HTMLHelper();
echo $table->print_table($a);
?>


<!-- print_select -->
<?php 

$sample_array = array("CA", "WA", "UT", "TX", "AZ", "NY");
$example = new HTMLHelper();
echo $example->print_select('state',$sample_array);


 ?>
</body>
</html>

