<?php
$passwd_filename = "../htdocs/private/passwd";
function ft_error() {
	header('Location: create.html');
	echo "ERROR\n";
}
function get_accounts($filename) {
	if (file_exists($filename))
		return (unserialize(file_get_contents($filename)));
	return array();
}
function mkdir2($path) {
	if (!file_exists($path)) {
		return mkdir($path);
	}
	return (true);
}
if (!mkdir2("../htdocs/") || !mkdir2("../htdocs/private/"))
	return ft_error();
$accounts = get_accounts($passwd_filename);
if ($_POST['login'] == null || $_POST['passwd'] == null || $_POST['submit'] != "OK")
	return ft_error();
$login = $_POST['login'];
$pass = $_POST['passwd'];
if ($accounts[$login] != null)
	return ft_error();
$accounts[$login] = array(
	login => $login,
	passwd => hash('whirlpool', $pass)
);
file_put_contents($passwd_filename, serialize($accounts));
header('Location: index.html');
echo "OK\n";
?>
