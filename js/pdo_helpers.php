<?php

function setHeaders() {
	// Set charset
	@header('Content-Type: text/html; charset=UTF-8');
	// Allow certain domains to request this data
	switch($_SERVER['HTTP_ORIGIN']) {
		case "https://tutsos.com":
		case "https://www.tutsos.com":
			@header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']);
			break;
	}
}



function makeConnection(
	// Default values can be overridden
	$db_name="mysql:dbname=zoem12; host=localhost; charset=utf8",
	$db_user="zq2y59hz7i88",
	$db_pass="521mljB2Y!"
) {
	// If a $conn already exists, return that
	if(isset($GLOBALS['conn'])) return $GLOBALS['conn'];
	try {
	    $conn = new PDO($db_name, $db_user, $db_pass);
	} catch (PDOException $e) {
	    echo 'Connection failed: ' . $e->getMessage();
	    die;
	}
	// Set the headers for the page and return the conn
	setHeaders();
	return $conn;
}



function makeQuery($conn,$sql,$params) {
	// Prepare the SQL
	$prepared = $conn->prepare($sql);

	// Execute the statement with parameters if necessary
	if(empty($params)) $prepared->execute();
	else $prepared->execute($params);

	// Return result array of row objects
	return $prepared->fetchAll();
}




function makeStatement() {
	// Get the type from the get, or default to 1
	$type = isset($_GET['ps'])? $_GET['ps'] : 1;

	$orderlimit = makeOrderLimit();

	$sql = "";
	$params = [];
	// Switch through the types and create specific statements.
	switch($type) {
		case 1:
			$sql = "SELECT * FROM Products $orderlimit";
			break;
		case 2:
			$sql = "SELECT * FROM Products WHERE id=:id";
			$params[':id'] = $_GET['id'];
			break;
		case 3:
			$where = sanitize($_GET['where']);
			$sql = "SELECT * FROM Products WHERE $where LIKE concat('%',:like,'%') $orderlimit";
			$params[':like'] = $_GET['like'];
			break;
		case 4:
			$where = sanitize($_GET['where']);
			$sql = "SELECT * FROM Products WHERE $where = :what $orderlimit";
			$params[':what'] = $_GET['what'];
			break;
		case 5:
			$where = sanitize($_GET['where']);
			$qs = str_repeat('?,', count(explode(",",$_GET['in'])) - 1).'?';
			$sql = "SELECT * FROM Products WHERE $where IN ($qs) $orderlimit";
			$params = explode(",",$_GET['in']);
			break;
	}
	return [$sql,$params];
}




function makeOrderLimit() {
	$limit =
		getDefaultComp($_GET,['limit']," LIMIT %d "," LIMIT 12 ");
	$orderby =
		getDefaultComp($_GET,['orderby','direction']," ORDER BY %s %s "," ORDER BY date_create DESC ");
	return " $orderby $limit ";
}


function makeResponse($r) {
	// Stop the script by printing out a json_encoded array
	die(json_encode($r,JSON_NUMERIC_CHECK));
}