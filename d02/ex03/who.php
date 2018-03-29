#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

function get_column_width($arr, $key) {
	$width = 0;
	foreach ($arr as $d)
		$width = max($width, strlen($d[$key]));
	return ($width);
}

$utmp_path = "/var/run/utmpx";
if (!file_exists($utmp_path) || !is_readable($utmp_path))
	exit();
$file = fopen("/var/run/utmpx", "r");
$users = array();
while ($buff = fread($file, 628)) {
	$data = unpack("A256_user/a4_id/A32_tty/i_pid/s_type/s_ukn/i_timestamp/i_usec/a256_host", $buff);
	if ($data["_type"] == 7)
		$users[$data['_pid']] = $data;
}
ksort($users);
$user_w = get_column_width($users, "_user") + 1;
$tty_w = get_column_width($users, "_tty") + 2;
foreach ($users as $user) {
	$str = '';
	$str .= sprintf("%-". $user_w ."s", $user["_user"]);
	$str .= sprintf("%-". $tty_w ."s", $user["_tty"]);
	$str .= sprintf("%s", strftime("%b %d %R", $user["_timestamp"]));
	printf("%s\n", $str);
}
?>
