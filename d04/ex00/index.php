<?php
	session_start();
	if ($_GET['login'] != null && $_GET['passwd'] != null &&
		$_GET['submit'] == "OK")
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>
<html><body>
<form method="get">
	Identifiant: <input type="text" name="login" value="<?= $_SESSION['login'] ?>" />
	<br />
	Mot de passe: <input type="password" name="passwd" value="<?= $_SESSION['passwd'] ?>" />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
