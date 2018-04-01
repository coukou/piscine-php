<?php
function database_product_delete($id)
{
	$conn = mysqli_connect(
		DATABASE_HOST,
		DATABASE_USER,
		DATABASE_PASS,
		DATABASE_DB
	);
	if (!mysqli_connect_error())
	{
		if ($stmt = mysqli_prepare($conn, "DELETE FROM products WHERE id=?"))
		{
			var_dump($id);
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			if (mysqli_stmt_affected_rows($stmt) != 1)
				$err = DBE_USER_DELETE_FAILED;
			mysqli_stmt_close($stmt);
		}
		else
			$err = DBE_DATABASE;
		mysqli_close($conn);
	}
	else
		$err = DBE_DATABASE;
	return ($err);
}
