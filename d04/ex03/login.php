<?php
include("auth.php");
session_start();
function ft_error() {
	$_SESSION['logged_on_user'] = "";
	echo "ERROR\n";
}
if ($_GET['login'] == null || $_GET['passwd'] == null)
	return (ft_error());
if (!auth($_GET['login'], $_GET['passwd']))
	return (ft_error());
$_SESSION['logged_on_user'] = $_GET['login'];
echo "OK\n";
?>
