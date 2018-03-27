#!/usr/bin/php
<?php
	function is_operator($op) {
		$operators = "+-*/%";
		for ($i = 0; $i < strlen($operators); $i++)
			if ($operators[$i] == $op)
				return (true);
		return (false);
	}
	function is_valid_data($data) {
		return (
			count($data) == 3 &&
			is_numeric($data[0]) &&
			is_operator($data[1]) &&
			is_numeric($data[2])
		);
	}
	function do_op($data) {
		switch ($data[1]) {
			case "+":
				return $data[0] + $data[2];
			case "-":
				return $data[0] - $data[2];
			case "*":
				return $data[0] * $data[2];
			case "/":
				return $data[0] / $data[2];
			case "%":
				return $data[0] % $data[2];
		}
	}
	if ($argc != 2) {
		echo "Incorrect Parameters\n";
	} else {
		$data = [];
		preg_match_all("/(\-?\w+|[\+\-\*\/\%])/", $argv[1], $data);
		$data = $data[0];
		if (!is_valid_data($data))
			echo "Syntax Error\n";
		else
			echo do_op($data) . "\n";
	}
?>
