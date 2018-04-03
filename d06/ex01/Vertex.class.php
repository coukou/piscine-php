<?php

require('Color.class.php');

class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	public static $verbose = false;

	public static function doc() {
		return file_get_contents('./Vertex.doc.txt');
	}

	function __construct(array $kwargs) {
		$rkeys = array('x','y','z');
		$mkeys = array_diff_key(array_flip($rkeys), $kwargs);

		if (count($mkeys) > 0)
			die('Vertex::__construct called with bad inputs. Missing keys:'. print_r(array_keys($mkeys), true) . PHP_EOL);

		$this->_x = intval($kwargs['x']);
		$this->_y = intval($kwargs['y']);
		$this->_z = intval($kwargs['z']);
		$this->_w = (array_key_exists('w', $kwargs) ? floatval($kwargs['w']) : 1.0);

		if (array_key_exists('color', $kwargs) && $kwargs['color'] instanceof Color)
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('rgb' => 'FFF'));
	}

	function __destruct() {}
	function __toString() {}

	// --- GETTERS
	public function getX(): int {
		return $this->_x;
	}

	public function getY(): int {
		return $this->_y;
	}

	public function getZ(): int {
		return $this->_z;
	}

	public function getW(): float {
		return $this->_w;
	}

	public function getColor(): Color {
		return $this->_color;
	}

	// --- SETTERS
	public function setX(int $v): Vertex {
		$this->_x = $v;
		return $this;
	}

	public function setY(int $v): Vertex {
		$this->_y = $v;
		return $this;
	}

	public function setZ(int $v): Vertex {
		$this->_z = $v;
		return $this;
	}

	public function setW(float $v): Vertex {
		$this->_w = $v;
		return $this;
	}

	public function setColor(color $v): Vertex {
		$this->_color = $v;
		return $this;
	}
}

$vertex = new Vertex(array(
	'x' => 0,
	'y' => 0,
	// 'z' => 0.6,
	'w' => 2,
	'color' => new Color(array('rgb' => '0f0'))
));
