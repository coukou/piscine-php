#!/usr/bin/php
<?php
if (isset($argv[1])) {
	echo preg_replace("/\s+/", " ", trim($argv[1])) . "\n";
}
?>
