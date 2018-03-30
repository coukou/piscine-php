<?php
include("auth.php");
session_start();
if ($_SESSION['login'] == null && $_POST['login'] != null && $_POST['passwd'] != null) {
	if (auth($_POST['login'], $_POST['passwd']) == true) {
		$_SESSION['login'] = $_POST['login'];
	}
}
if ($_SESSION['login'] != null) {
?>
<html>
	<body>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>
<?php
} else {
	header('Location: index.html');
	echo "ERROR\n";
}
?>
