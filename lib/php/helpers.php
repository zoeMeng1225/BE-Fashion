<?php

function print_p($v) {
	echo "<pre>",print_r($v),"</pre>";
}


function getQueryResults($qry) {
	global $conn;

	$result = $conn->query($qry);
	if($conn->errno) die(
		json_encode(array(
			"sql"=>preg_replace('/\t|\n/','',$qry),
			"error"=>$conn->error
		))
	);

	$result_array = array();
	while($row = $result->fetch_object()) {
		$result_array[] = $row;
	}

	return $result_array;
}

// $a = array of data, $p = array of properties
function areset(&$a,$p) {
	foreach($p as $o) { if(!isset($a[$o])) return false; }
	return true;
}

function getDefault($p,$s) {
	return isset($_GET[$p]) ? $_GET[$p] : $s;
}
function getDefaultComp(&$a,$p,$s,$d) {
	return areset($a,$p) ?
		vsprintf(
			$s,
			array_map(
				function($k) use ($a) {
					return sanitize($a[$k]);
				},
				$p
			)
		) :
		$d;
}


function sanitize($str) { return str_replace(["'",'"','`',';'],['','','',''],$str); }


function likeGroup($where,$like) {
	$result = " WHERE ";
	$arr = explode(",",$where);
	for($i=0;$i<count($arr); $i++) {
		if($i) $result .= " OR ";
		$result .= " $arr[$i] LIKE '%$like%' ";
	}
	return $result;
}