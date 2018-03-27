<?php
function ft_split($str) {
	$words = preg_split("/\s+/", $str);
	sort($words);
	return ($words);
}
print_r(ft_split("Hello		World AAA"));
?>
