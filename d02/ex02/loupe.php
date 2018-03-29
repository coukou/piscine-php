#!/usr/bin/php
<?php
function is_close_tag($tag, $str) {
	return (preg_match("/<\/$tag>/i", $str));
}

function is_open_tag($tag, $str) {
	return (preg_match("/<$tag(.*?)>/i", $str));
}

function is_text($str) {
	return !(preg_match("/<(.*?)>/i", $str));
}

if (isset($argv[1])) {
	if (file_exists($argv[1])) {
		$html = file_get_contents($argv[1], true);
		$html = preg_replace_callback("/(<(.*?)>)/", function($matches) {
			return $matches[0] . "\0";
		}, $html);
		$html = preg_replace_callback("/(?=(<(.*?>)))/", function($matches) {
			return $matches[0] . "\0";
		}, $html);
		$lines = array_filter(explode("\0", $html));
		$a_count = 0;
		foreach ($lines as &$line) {
			if (is_open_tag("a", $line))
				$a_count++;
			if (is_close_tag("a", $line))
				$a_count--;
			if (is_text($line) && $a_count > 0) {
				$line = strtoupper($line);
			}
		}
		$html = implode($lines);
		$html = preg_replace_callback("/(title\=[\'|\"])(.*?)([\'|\"])/i", function($matches) {
			return $matches[1] . strtoupper($matches[2]) . $matches[3];
		}, $html);
		echo $html;
	}
}
?>
