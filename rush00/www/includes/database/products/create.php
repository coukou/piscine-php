<?php
function database_product_create($name, $img, $cat_id, $price, $stock)
{
	$conn = mysqli_connect(
		DATABASE_HOST,
		DATABASE_USER,
		DATABASE_PASS,
		DATABASE_DB
	);
	if (!mysqli_connect_error())
	{
		$exist = database_product_get($name) != null;
		if ($exist == 0)
		{
			if ($stmt = mysqli_prepare($conn, "INSERT INTO products (name, img, cat_id, price, stock) VALUES (?,?,?,?,?)"))
			{
				mysqli_stmt_bind_param($stmt, "ssidi",
					$name,
					$img,
					$cat_id,
					$price,
					$stock
				);
				mysqli_stmt_execute($stmt);
				if (mysqli_stmt_affected_rows($stmt) != 1) // error
					$err = DBE_USER_CREATE_FAILED;
				mysqli_stmt_close($stmt);
			}
			else
				$err = DBE_DATABASE;
		}
		else if ($exist == 1)
			$err = DBE_USER_CREATE_ALREADY_EXIST;
		else
			$err = DBE_DATABASE;
		mysqli_close($conn);
	}
	else
		$err = DBE_DATABASE;
	return ($err);
}
