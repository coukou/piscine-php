<?php
$chat_filename = "../htdocs/private/chat";

session_start();
function mkdir2($path) {
	if (!file_exists($path)) {
		return mkdir($path);
	}
	return (true);
}
if ($_SESSION['login'] != null && $_POST['msg'] != null && $_POST['submit'] == 'OK') {
	if (!mkdir2("../htdocs/") || !mkdir2("../htdocs/private/"))
		return ;
	if (file_exists($chat_filename))
		$messages = unserialize(file_get_contents($chat_filename));
	$messages[] = array(
		"login" => $_SESSION['login'],
		"time" => time(),
		"msg" => $_POST['msg']
	);
	file_put_contents($chat_filename, serialize($messages));

}
if ($_SESSION['login'] != null) {
?>
<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
		<style>
			body {
				overflow: hidden;
			}
			form {
				display: flex;
			}
			input {
				-webkit-appearance: none;
				height: 100%;
				flex-grow: 1;
			}
			input[name=submit] {
				max-width: 50px;
			}
		</style>
	</head>
	<body>
		<form method="POST">
			<input type="text" name="msg" value="" autofocus />
			<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
<?php
} else {
	header('Location: index.html');
	echo "ERROR\n";
}
?>
