#!/usr/bin/php
<?php
if (!isset($argv[1]))
	exit();
if (!file_exists($argv[1]) || !is_readable($argv[1]))
	exit();
$pattern = "/([\d]{2}:[\d]{2}:[\d]{2},[\d]{3} --> [\d]{2}:[\d]{2}:[\d]{2},[\d]{3})\n(.+)/";
$matches = array();
preg_match_all($pattern, file_get_contents($argv[1]), $matches);
sort($matches[0]);
$max = count($matches[0]);
for ($i = 0; $i < $max; $i++) {
	printf("%d\n%s\n", $i + 1, $matches[0][$i]);
	if ($i < $max - 1)
		echo "\n";
}
?>
