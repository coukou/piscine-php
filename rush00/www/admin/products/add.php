<?php
include("../../includes/utils.php");
include("../../includes/database.php");
session_start();

if (restrict_access(1, "/"))
	return;
if (check_params_isset($_GET, "name", "price", "stock"))
{
	$err = database_product_create(
		$_GET['name'],
		$_GET['img'],
		$_GET['cat_id'],
		$_GET['price'],
		$_GET['stock']
	);
	if (!$err)
		header("Location: ./");
}
?>
<a href="/admin/products/">back</a>
<form>
	<table>
	<thead>
		<tr>
			<th>name</th>
			<th>price</th>
			<th>stock</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><input name="name" type="text" value=""></td>
			<td><input name="price" type="text" value="0"></td>
			<td><input name="stock" type="text" value="0"></td>
			<td><input name="submit" type="submit" value="add"></td>
		</tr>
	</tbody>
	</table>
</form>
