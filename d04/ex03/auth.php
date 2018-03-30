<?php
function auth($login, $passwd) {
	$accounts = unserialize(file_get_contents("../htdocs/private/passwd"));
	if ($accounts[$login] === null)
		return (false);
	return ($accounts[$login]['passwd'] == hash('whirlpool', $passwd));
}
?>
