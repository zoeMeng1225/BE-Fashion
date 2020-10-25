<?php

include "../lib/php/helpers.php";
require_once "../lib/php/db_connect.php";

$table =
	getDefaultComp($_GET,['table']," %s "," Products ");
$select =
	getDefaultComp($_GET,['select']," %s "," * ");

$limit =
	getDefaultComp($_GET,['limit']," LIMIT %d "," LIMIT 15 ");
$wherewhat =
	getDefaultComp($_GET,['where','what']," WHERE `%s` = '%s' ","");
$wherein =
	getDefaultComp($_GET,['where','in']," WHERE `%s` IN (%s) ","");
$orderby =
	getDefaultComp($_GET,['orderby','direction']," ORDER BY %s %s "," ORDER BY date_create DESC ");

$wherelike = areset($_GET,['where','like']) ?
	likeGroup($_GET['where'],$_GET['like']) : "";

$sql = "
	SELECT
	$select
	FROM
	$table
	$wherewhat
	$wherein
	$wherelike
	$orderby
	$limit
	";

$result = getQueryResults($sql);

die(json_encode(
	array(
		"sql"=>preg_replace('/\t|\n/','',$sql),
		"result"=>$result
	)
	,JSON_NUMERIC_CHECK)
);