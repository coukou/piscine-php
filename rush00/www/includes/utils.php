<?php

function check_params_isset($params, ...$keys) {
	foreach ($keys as $k) {
		if (!isset($params[$k]) || $params[$k] == null)
			return (false);
	}
	return (true);
}

function utils_pass_encrypt($pass) {
	return hash('whirlpool', $pass);
}

function restrict_access($access, $redirect = "/") {
	if ($_SESSION['access'] != $access) {
		header("Location: $redirect");
		return (true);
	}
	return (false);
}
