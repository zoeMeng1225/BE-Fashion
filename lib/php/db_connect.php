<?php

$db_host = "localhost";
$db_user = "zq2y59hz7i88";
$db_pass = "521mljB2Y!";
$db_name = "zoem12";

$conn = new mysqli(
	$db_host,
	$db_user,
	$db_pass,
	$db_name
);

if($conn->connect_errno)
	die($conn->connect_error);

header('Content-Type: text/html; charset=UTF-8');
$conn->set_charset('utf8');