#!/usr/bin/php
<?php
if ($argc > 1) {
	$str = implode(" ", array_slice($argv, 1));
	$arr = preg_split("/[ ]+/", $str);
	sort($arr);
	echo implode("\n", $arr) . "\n";
}
?>
