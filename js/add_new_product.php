<?php

include "lib/php/db_connect.php";

$query_string = "INSERT INTO products
(
	-- column names
	`date_modify`,
	`date_create`,
	`name`,
	`description`,
	`price`,
	`category`,
	`thumbnail`,
	`image01`
)
VALUES
(
	-- values
	NOW(),
	NOW(),
	'Durian',
	'I only know Durian\'s from zelda',
	9.99,
	'fruit',
	'/images/store/fruit_durian_m.jpg',
	'/images/store/fruit_durian.jpg'
)
";

$result = $conn->query($query_string);
if($conn->errno) die($conn->error);

?>
You did it! New product added.