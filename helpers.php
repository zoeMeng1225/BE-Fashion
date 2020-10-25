<?php

function print_p($v) {
	echo "<pre>",print_r($v),"</pre>";
}


function getQueryResults($qry) {
	global $conn;

	$result = $conn->query($qry);
	if($conn->errno) die(
		json_encode(array(
			"sql"=>$qry,
			"error"=>$conn->error
		))
	);

	$result_array = array();
	while($row = $result->fetch_object()) {
		$result_array[] = $row;
	}

	return $result_array;
}

function areset($a) {
	foreach($a as $o) { if(!isset($_GET[$o])) return false; }
	return true;
}

function getDefault($p,$s) {
	return isset($_GET[$p]) ? $_GET[$p] : $s;
}
function getDefaultComp($p,$s,$d) {
	return areset($p) ?
		vsprintf(
			$s,
			array_map(
				function($a){return $_GET[$a];},
				$p
			)
		) :
		$d;
}


function likeGroup($where,$like) {
	$result = " WHERE ";
	$arr = explode(",",$where);
	for($i=0;$i<count($arr); $i++) {
		if($i) $result .= " OR ";
		$result .= " $arr[$i] LIKE '%$like%' ";
	}
	return $result;
}