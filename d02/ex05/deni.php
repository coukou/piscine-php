#!/usr/bin/php
<?php
if ($argc != 3)
	exit();
$file = $argv[1];
$hkey = $argv[2];
if (!file_exists($file) || !is_readable($argv[1]))
	exit();
$lines = explode("\n", file_get_contents($file));
if (count($lines) == 0)
	exit();
$header_keys = explode(";", array_shift($lines));
if (array_search($hkey, $header_keys) === false)
	exit();
foreach ($lines as $line) {
	$data = explode(";", $line);
	if (count($data) != count($header_keys))
		continue ;
	$tmp = array();
	foreach ($header_keys as $i => $hk)
		$tmp[$hk] = $data[$i];
	foreach ($header_keys as $hk) {
		$hk_ptr = &$$hk;
		$hk_ptr[$tmp[$hkey]] = $tmp[$hk];
	}
}
function ask_command() {
	echo "Entrez votre commande: ";
	return (fgets(STDIN));
}
while ($code = ask_command()) {
	eval($code);
}
?>
