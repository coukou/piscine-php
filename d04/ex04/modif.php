<?php
$passwd_filename = "../htdocs/private/passwd";
function ft_error() {
	header('Location: modif.html');
	echo "ERROR\n";
}
$accounts = unserialize(file_get_contents($passwd_filename));
if ($_POST['login'] == null || $_POST['oldpw'] == null ||
	$_POST['newpw'] == null || $_POST['submit'] == null)
	return ft_error();
if ($_POST['submit'] != 'OK')
	return ft_error();
$login = $_POST['login'];
if ($accounts[$login] == null)
	return ft_error();
$o_pass = hash("whirlpool", $_POST['oldpw']);
$n_pass = hash("whirlpool", $_POST['newpw']);
if ($accounts[$login]['passwd'] != $o_pass)
	return ft_error();
$accounts[$login]["passwd"] = $n_pass;
file_put_contents($passwd_filename, serialize($accounts));
header('Location: index.html');
echo "OK\n";
?>
