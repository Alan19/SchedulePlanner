<?php

// get the q parameter from URL
$q = $_REQUEST["q"];
$qCopy = $q;

$arr = array();

while (substr_count($q, "[]") > 0) {
	$a = strpos($q, "[]");

	$toAdd = substr($q, 0, $a);

	array_push($arr, $toAdd);

	$q = substr($q, $a + 2);

}



// $s = "";
//
// for ($i=0; $i < count($arr); $i++) {
// 	$s = $s . "  |  " . $arr[$i];
// }
//
// echo $s;

// $s = implode("           ", $arr);
echo print_r($arr);






?>
