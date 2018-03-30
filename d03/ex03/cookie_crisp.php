<?php
function get_param($key){
	foreach ($_GET as $k => $v) {
		if ($k == $key)
			return ($v);
		}
		return (null);
	}
	function ft_isset($key) {
		return ($key !== null);
	}

	function set_cookie($name, $value) {
		if (!ft_isset($name) || !ft_isset($value))
		return ;
		$t = time() + (7 * 24 * 60 * 60);
		setcookie($name, $value, $t);
	}

function get_cookie($name) {
	if (!ft_isset($name))
		return ;
	foreach ($_COOKIE as $k => $v) {
		if ($k == $name)
			return ($v);
	}
}

function del_cookie($name) {
	if (ft_isset($name))
		setcookie($name, null, -1);
}

switch (get_param("action")) {
	case "set":
		set_cookie(get_param("name"), get_param("value"));
		break;
	case "get":
		if ($c = get_cookie(get_param("name")))
			echo "$c\n";
		break;
	case "del":
		del_cookie(get_param("name"));
		break;
}
?>
