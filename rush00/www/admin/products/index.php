<?php
include("../../includes/utils.php");
include("../../includes/database.php");
session_start();

if (restrict_access(1, "/"))
	return;
?>
<a href="../">back</a><br />
<a href="./add.php">add product</a>
<style>
	th {
		min-width: 100px;
	}
	td {
		text-align: center;
	}
</style>
<table>
	<thead>
		<tr>
			<th>name</th>
			<th>price</th>
			<th>stock</th>
		</tr>
	</thead>
	<tbody>
<?php

$products = database_product_get_all();
foreach ($products as $product)
{
?>
<tr>
	<td><?= $product['name']; ?></td>
	<td><?= $product['price']; ?></td>
	<td><?= $product['stock']; ?></td>
	<td><a href="./delete.php?item=<?= $product['id']; ?>">delete</a></td>
	<td><a href="./edit.php?item=<?= $product['id']; ?>">edit</a></td>
</tr>
<?php
}
?>
</tbody></table>
