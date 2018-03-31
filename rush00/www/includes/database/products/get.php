<?php
function database_product_get($id)
{
	$conn = mysqli_connect(
		DATABASE_HOST,
		DATABASE_USER,
		DATABASE_PASS,
		DATABASE_DB
	);
	if (!mysqli_connect_error())
	{
		if (!($stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id=?")))
			return (null);
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while ($data[] = mysqli_fetch_array($result, MYSQLI_ASSOC))
			;
		mysqli_stmt_close($stmt);
		return ($data[0]);
	}
	return (null);
}
