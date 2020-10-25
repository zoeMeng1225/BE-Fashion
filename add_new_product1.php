<?php

include "lib/php/db_connect.php";




$values = implode(",",
	array(
	  "NOW()",
	  "NOW()",
	  "'".$_GET["name"]."'",
	  "'".$_GET["description"]."'",
	  $_GET["price"],
	  "'".$_GET["category"]."'", 
	  "'".$_GET["thumbnail"]."'",
	  "'".$_GET["image"]))."'";



$query_string = "INSERT INTO Products
(
	-- column names
	`date_modify`,
	`date_create`,
	`name`,
	`description`,
	`price`,
	`category`,
	`thumbnail`,
	`image`
)

VALUES
("
.
$values
.
")";

echo $query_string;

$result = $conn->query($query_string);
if($conn->errno) die($conn->error);

?>
You did it! New product added.<br>
<a href="product-list.php">Back to list</a>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>>