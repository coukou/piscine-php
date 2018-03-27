#!/usr/bin/php
<?php
	function create_dict($data) {
		$dict = [];
		foreach ($data as $d) {
			[$k, $v] = explode(":", $d);
			$dict[$k] = $v;
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
