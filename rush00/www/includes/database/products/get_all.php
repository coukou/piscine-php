<?php
function database_product_get_all()
{
	$conn = mysqli_connect(
		DATABASE_HOST,
		DATABASE_USER,
		DATABASE_PASS,
		DATABASE_DB
	);
	if (!mysqli_connect_error())
	{
		if (!($stmt = mysqli_prepare($conn, "SELECT * FROM products")))
			return (null);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$data[] = $row;
		mysqli_stmt_close($stmt);
		return ($data);
	}
	return (null);
}
