<?php
function database_user_create($login, $passwd, $access = 0)
{
	$conn = mysqli_connect(
		DATABASE_HOST,
		DATABASE_USER,
		DATABASE_PASS,
		DATABASE_DB
	);
	if (!mysqli_connect_error())
	{
		$exist = database_user_get($login) != null;
		if ($exist == 0)
		{
			if ($stmt = mysqli_prepare($conn, "INSERT INTO users (login, passwd, access) VALUES (?,?,?)"))
			{
				mysqli_stmt_bind_param($stmt, "ssi",
					$login,
					hash("whirlpool", $passwd),
					$access
				);
				mysqli_stmt_execute($stmt);
				if (mysqli_stmt_affected_rows($stmt) != 1) // error
					$err = DBE_USER_CREATE_FAILED;
				mysqli_stmt_close($stmt);
			}
			else
				$err = DBE_USER_DATABASE;
		}
		else if ($exist == 1)
			$err = DBE_USER_CREATE_ALREADY_EXIST;
		else
			$err = DBE_USER_DATABASE;
		mysqli_close($conn);
	}
	else
		$err = DBE_USER_DATABASE;
	return ($err);
}
