<?php

function cart_count()
{
	$count = 0;
	$price = 0;
	if (empty($_SESSION['cart']))
		return array($count, $price);
	foreach ($_SESSION['cart'] as $item)
	{
		$price += $item['amount'] * $item['price'];
		$count += $item['amount'];
	}
	return array($count, $price);
}

function print_cart()
{
	foreach ($_SESSION['cart'] as $id=>$item)
	{
		echo '<div class="article">
			<div class="articledata">
			<p>';
		echo "\n".$item['name']."<br />".$item['amount']." x ".$item['price']."$";
		echo '</p></div>
					<div class="articleoptions">
					<form action="remove.php" method="POST">
					<input type="hidden" name="id" value="'.$id.'" />
						<button type="submit" style="background-color:red;" name="type" value="one" >Remove one</button>
						<button type="submit" style="background-color:red" name="type" value="all">Remove all</button>
						</form>
					</div>
				</div>';
	}
}

?>
