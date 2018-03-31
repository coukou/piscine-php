<?php
include("./includes/database.php");
include("./includes/utils.php");

session_start();
if (isset($_SESSION['login']))
	login_redirect();
else if (check_params_isset($_POST, 'login', 'passwd', 'conf-passwd') && $_POST['submit'] == 'sign up')
{
	if ($_POST['passwd'] == $_POST['conf-passwd'])
	{
		switch (database_user_create($_POST['login'], $_POST['passwd']))
		{
			case DBE_USER_CREATE_ALREADY_EXIST:
				echo "Login already in use\n";
				break;
			case DBE_USER_CREATE_FAILED:
				echo "Unable to create account\n";
				break;
			case DBE_DATABASE:
				echo "Unable to create account\n";
				break;
			default:
				header('Location: /login.php');
				break;
		}
	}
	else
		echo "Password doesnt match\n";
}
?>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/login.css">
	<title>Signup</title>
</head>

<body>
	<div class="login-container">
		<div class="login-logo">
			<img src="/resources/shopping-cart.png" alt="42 logo">
		</div>

		<div class="login-title">
			<h2>
				<span class="icon-lock"></span>
				Signup
			</h2>
		</div>
		<div class="login-between"></div>
		<div class="login-main">
			<form method="POST">
				<input name="login" placeholder="identifiant" type="text" /><br />
				<input name="passwd" placeholder="password" type="password" /><br />
				<input name="conf-passwd" placeholder="conf password" type="password" /><br />
				<input name="submit" type="submit" value="sign up" />
			</form>
		</div>
	</div>
</body>

</html>
