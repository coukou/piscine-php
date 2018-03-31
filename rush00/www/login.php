<?php
include("./includes/database.php");
include("./includes/utils.php");

session_start();
function login_redirect() {
	header('Location: /');
}
if (isset($_SESSION['login']))
	login_redirect();
else if (check_params_isset($_POST, 'login', 'passwd') && $_POST['submit'] == 'OK')
{
	if ($user = database_user_get($_POST['login']))
	{
		if ($user['passwd'] == utils_pass_encrypt($_POST['passwd']))
		{
			$_SESSION['login'] = $user['login'];
			$_SESSION['access'] = $user['access'];
			login_redirect();
		}
		else
			echo "Identifiant / Mot de passe incorect\n";
	}
	else
		echo "Identifiant / Mot de passe incorect\n";
}
?>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/login.css">
	<title>Login</title>
</head>

<body>
	<div class="login-container">
		<div class="login-logo">
			<img src="/resources/shopping-cart.png" alt="42 logo">
		</div>

		<div class="login-title">
			<h2>
				<span class="icon-lock"></span>
				Login
			</h2>
		</div>
		<div class="login-between"></div>
		<div class="login-main">
			<form method="POST">
				<input name="login" placeholder="identifiant" type="text" /><br />
				<input name="passwd" placeholder="password" type="password" /><br />
				<input name="submit" type="submit" value="OK" />
			</form>
		</div>
	</div>
</body>

</html>
