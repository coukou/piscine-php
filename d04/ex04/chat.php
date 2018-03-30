<?php
session_start();
date_default_timezone_set("Europe/Paris");

if ($_SESSION['login'] == null) {
	header("Location: index.html");
	echo "ERROR\n";
	return ;
}
$chat_filename = "../htdocs/private/chat";
if (file_exists($chat_filename)) {
	$messages = unserialize(file_get_contents($chat_filename));
}
if ($messages) {
	foreach($messages as $msg) {
		$login = $msg["login"];
		$message = $msg["msg"];
		$d = date("H:i", $msg["time"]);
		echo "[$d] <b>$login</b>: $message<br />\n";
	}
}
?>
