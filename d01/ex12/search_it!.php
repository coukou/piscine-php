#!/usr/bin/php
<?php
	function create_dict($data) {
		$dict = [];
		foreach ($data as $d) {
			$tmp = explode(":", $d);
			$dict[$tmp[0]] = $tmp[1];
		}
		return ($dict);
	}
	if ($argc < 3)
		return (0);
	$key = $argv[1];
	$dict = create_dict(array_slice($argv, 2));
	if (isset($dict[$key]))
		echo $dict[$key] . "\n";
?>
