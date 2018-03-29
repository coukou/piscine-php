#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

$DAYS = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
$MONTHS = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");

function is_valid_date($date) {
	global $DAYS, $MONTHS;
	return (
		($date["h"] >= 0 && $date["h"] <= 24) &&
		($date["m"] >= 0 && $date["m"] <= 60) &&
		($date["s"] >= 0 && $date["s"] <= 60) &&
		(array_search(lcfirst($date["month"]), $MONTHS) > -1) &&
		(array_search(lcfirst($date["day"]), $DAYS) > -1)
	);
}
if (isset($argv[1])) {
	$pattern = "/(?P<day>\w+) (?P<d>\d+) (?P<month>\w+) (?P<y>\d+) (?P<h>\d+):(?P<m>\d+):(?P<s>\d+)/";
	$date = array();
	if (preg_match($pattern, $argv[1], $date) &&
		is_valid_date($date))
	{
		$time = mktime(
			$date["h"],
			$date["m"],
			$date["s"],
			array_search(lcfirst($date["month"]), $MONTHS) + 1,
			array_search(lcfirst($date["day"]), $DAYS) + 1,
			$date["y"]
		);
		echo "$time\n";
	} else {
		echo "Wrong Format\n";
	}
}
?>
