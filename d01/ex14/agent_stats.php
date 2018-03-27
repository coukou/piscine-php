#!/usr/bin/php
<?php
class Correction {
	public $by;
	public $note;

	function __construct($by, $note) {
		$this->by = $by;
		$this->note = $note;
	}
}
class User {
	private $corrections = [];

	function getMoulinetteCorrection() {
		foreach ($this->corrections as $corr) {
			if ($corr->by == 'moulinette')
				return ($corr);
		}
		return (null);
	}

	function getMoyenne($moulinette = 1) {
		return ($this->getNoteTotal($moulinette) / $this->getCorrectionCount($moulinette));
	}

	function getNoteTotal($moulinette = 1) {
		$total = 0;
		foreach ($this->corrections as $corr) {
			if (!$moulinette && $corr->by == 'moulinette')
				continue;
			$total += $corr->note;
		}
		return ($total);
	}

	function getMoulinetteDiffMoyenne() {
		$m_corr = $this->getMoulinetteCorrection();
		if ($m_corr == null)
			return (0);
		$total = 0;
		foreach ($this->corrections as $corr) {
			if ($corr->by == 'moulinette')
				continue;
			$total += $corr->note - $m_corr->note;
		}
		return ($total / $this->getCorrectionCount(0));
	}

	function getCorrectionCount($moulinette = 1) {
		return (count($this->corrections) - ($moulinette ? 0 : 1));
	}

	function addCorrection($by, $note) {
		if ($note == null)
			return ;
		array_push($this->corrections, new Correction($by, $note));
	}
}
if ($argc == 2) {
	if (
		$argv[1] != 'moyenne' &&
		$argv[1] != 'moyenne_user' &&
		$argv[1] != 'ecart_moulinette'
	)
		return;
	$users = [];
	$check_header = true;
	while ($line = fgets(STDIN)) {
		if ($check_header) {
			if ($line != "User;Note;Noteur;Feedback")
				return ;
			else {
				$check_header = false;
				continue ;
			}
		}
		$data = explode(";", $line);
		if (count($data) != 4)
			continue ;
		$id = $data[0];
		$note = $data[1];
		$by = $data[2];
		$feedback = $data[3];
		if (!isset($users[$id]))
			$users[$id] = new User();
		$users[$id]->addCorrection($by, $note);
	}
	if ($argv[1] == 'moyenne') {
		$total = 0;
		$nc = 0;
		foreach ($users as $user) {
			if (($count = $user->getCorrectionCount(0)) <= 0)
				continue ;
			$total += $user->getNoteTotal(0);
			$nc += $count;
		}
		echo ($total / $nc) . "\n";
	}
	if ($argv[1] == 'moyenne_user') {
		ksort($users);
		foreach ($users as $id => $user) {
			echo $id . ":" . $user->getMoyenne(0) . "\n";
		}
	}
	if ($argv[1] == 'ecart_moulinette') {
		ksort($users);
		foreach ($users as $id => $user) {
			if ($user->getCorrectionCount(0) <= 0)
				continue ;
			echo $id . ":" . $user->getMoulinetteDiffMoyenne() . "\n";
		}
	}
}
?>
