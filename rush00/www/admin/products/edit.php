<?php
include("../../includes/utils.php");
include("../../includes/database.php");
session_start();

if (restrict_access(1, "/"))
	return;
if (check_params_isset($_GET, "item", "name", "price", "stock"))
{
	$err = database_product_update($_GET['item'], array(
		name => $_GET['name'],
		price => floatval($_GET['price']),
		stock => intval($_GET['stock'])
	));
	if ($err == 0)
		return header("Location: ./");
}
if (!($product = database_product_get($_GET['item'])))
	return header("Location: ./");
?>
<a href="/admin/products/">back</a>
<form>
	<input style="display:none;" name="item" type="text" value="<?= $_GET['item'] ?>">
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
			<td><input name="name" type="text" value="<?= $product['name'] ?>"></td>
			<td><input name="price" type="text" value="<?= $product['price'] ?>"></td>
			<td><input name="stock" type="text" value="<?= $product['stock'] ?>"></td>
			<td><input name="submit" type="submit" value="edit"></td>
		</tr>
	</tbody>
	</table>
</form>
