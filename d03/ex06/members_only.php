<?php
function ft_isset($var) {
	return ($var !== null);
}
function login($user, $pass) {
	if (!ft_isset($user) || !ft_isset($pass))
		return (false);
	return ($user == "zaz" && $pass == "jaimelespetitsponeys");
}
if (!ft_isset($_SERVER['PHP_AUTH_USER']) ||
	!login($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
	header("WWW-Authenticate: Basic Realm=''Espace membres''");
	header("HTTP/1.0 401 Unauthorized");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
} else {
	$b64_image = base64_encode(file_get_contents("../img/42.png"));
?>
<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,<?php echo $b64_image; ?>'>
</body></html>
<?php
}
?>
