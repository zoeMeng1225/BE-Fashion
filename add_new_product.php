<?php

include "lib/php/db_connect.php";

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
(
	-- values
	NOW(),
	NOW(),
	'Dear-Lemon Hoodie Online Only',
	'Want casual comfort?\'You will like the comfort in the stretchy hooded pullover',
	130,
	'top',
	'http://zoeroom.com/aau/wnm608/m13/imgs/hoddie-m7-detail2.png',
	'http://zoeroom.com/aau/wnm608/m13/imgs/hoddie-m7-detail2.png'
)
";

$result = $conn->query($query_string);
if($conn->errno) die($conn->error);

?>
You did it! New product added.<br>
<a href="product-list.php">Back to list</a>