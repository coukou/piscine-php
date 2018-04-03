<?php

class Color {
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public static $verbose = false;

	public static function doc() {
		return file_get_contents('./Color.doc.txt');
	}

	public static function hex2rgb(string $hex) {
		$rgb = array("red" => 0, "green" => 0, "blue" => 0);
		$value = intval($hex, 16);
		if (strlen($hex) == 3)
		{
			$rgb['red'] = (($value >> 8) & 0xF) * 17;
			$rgb['green'] = (($value >> 4) & 0xF) * 17;
			$rgb['blue'] = (($value >> 0) & 0xF) * 17;
		}
		else if (strlen($hex) == 6)
		{
			$rgb['red'] = ($value >> 16) & 0xFF;
			$rgb['green'] = ($value >> 8) & 0xFF;
			$rgb['blue'] = ($value >> 0) & 0xFF;
		}
		else
		{
			if (self::$verbose)
				print('Color::hex2rgb: invalid hex string provided' . PHP_EOL);
		}
		return ($rgb);
	}

	public static function rgb2hex($red, $green, $blue) {
		return sprintf("%02x%02x%02x",
			max(min($red, 255), 0),
			max(min($green, 255), 0),
			max(min($blue, 255), 0)
		);
	}

	function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs))
		{
			if (self::$verbose)
				print('Color: Constructed with HEX arg' . PHP_EOL);
			$rgb = self::hex2rgb($kwargs['rgb']);
			$this->red = $rgb['red'];
			$this->green = $rgb['green'];
			$this->blue = $rgb['blue'];
		}
		else if (isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue']))
		{
			if (self::$verbose)
				print('Color: Constructed with r,g,b args' . PHP_EOL);
			$this->red = max(min(intval($kwargs['red']), 255), 0);
			$this->green = max(min(intval($kwargs['green']), 255), 0);
			$this->blue = max(min(intval($kwargs['blue']), 255), 0);
		}
		else
		{
			if (self::$verbose)
				print('Color: Constructed without args should i die ?' . PHP_EOL);
		}
	}

	function add(Color $color) {
		return new Color(array(
			"red" => $this->red + $color->red,
			"green" => $this->green + $color->green,
			"blue" => $this->blue + $color->blue,
		));
	}

	function sub(Color $color) {
		return new Color(array(
			"red" => $this->red - $color->red,
			"green" => $this->green - $color->green,
			"blue" => $this->blue - $color->blue,
		));
	}

	function mult(Color $color) {
		return new Color(array(
			"red" => $this->red * $color->red,
			"green" => $this->green * $color->green,
			"blue" => $this->blue * $color->blue,
		));
	}

	function __destruct() {
		if (self::$verbose)
			print('Color: Destructor called' . PHP_EOL);
	}
}
