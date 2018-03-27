#!/usr/bin/php
<?php
	if ($argc != 4) {
		echo "Incorrect Parameters\n";
	} else {
		switch (trim($argv[2])) {
			case "+":
				echo $argv[1] + $argv[3] . "\n";
				break;
			case "-":
				echo $argv[1] - $argv[3] . "\n";
				break;
			case "*":
				echo $argv[1] * $argv[3] . "\n";
				break;
			case "/":
				echo $argv[1] / $argv[3] . "\n";
				break;
			case "%":
				echo $argv[1] % $argv[3] . "\n";
				break;
		}
	}
?>
