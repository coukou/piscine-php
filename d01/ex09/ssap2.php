#!/usr/bin/php
<?php
function ssap_sort(&$arr) {
	$str = [];
	$num = [];
	$oth = [];

	foreach ($arr as $v) {
		if (is_numeric($v[0]))
			array_push($num, $v);
		else if (preg_match("/[a-zA-Z]/", $v[0]))
			array_push($str, $v);
		else
			array_push($oth, $v);
	}
	sort($str, SORT_FLAG_CASE | SORT_STRING);
	sort($num);
	sort($oth);
	$arr = array_merge($str, $num, $oth);
}

if ($argc > 1) {
	$str = implode(" ", array_slice($argv, 1));
	$arr = preg_split("/[ ]+/", $str);
	ssap_sort($arr);
	echo implode("\n", $arr) . "\n";
}
?>
