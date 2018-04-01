<?php
function database_product_update($id, $data)
{
	$conn = mysqli_connect(
		DATABASE_HOST,
		DATABASE_USER,
		DATABASE_PASS,
		DATABASE_DB
	);
	if (!mysqli_connect_error())
	{
		if ($stmt = mysqli_prepare($conn, "UPDATE products set name=?,price=?,stock=? WHERE id=?"))
		{
			mysqli_stmt_bind_param($stmt, "sdii",
				$data['name'],
				$data['price'],
				$data['stock'],
				$id
			);
			var_dump(mysqli_stmt_execute($stmt));
			if (mysqli_stmt_affected_rows($stmt) <= 0)
				$err = DBE_USER_UPDATE_FAILED;
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
