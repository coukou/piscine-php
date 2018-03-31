<?php

include "cart_func.php";
session_start();
if (isset($_POST['id']))
{
	if (isset($_SESSION['cart'][$_POST['id']]['amount']) && isset($_SESSION['cart'][$_POST['id']]['price']))
		$_SESSION['cart'][$_POST['id']]['amount'] += '1';
	else
	{
		$_SESSION['cart'][$_POST['id']]['price'] = $_POST['price'];
		$_SESSION['cart'][$_POST['id']]['name'] = $_POST['name'];
		$_SESSION['cart'][$_POST['id']]['amount'] = '1';
	}
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="responsive.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script src="generategrid.js"></script>
		<title>Adopteunsadirac</title>
	</head>
	<header>
		<div id="leftheader">
		Adopteunsadirac
		</div>
		<div id="rightheader">
			<a href="cart.php"><img height="50%" width="20px"src="resources/shopping-cart.png" alt="cart"/> <?php $ret = cart_count(); if ($ret[0] > 0) echo $ret[0]." | ".$ret[1]."$"; ?></a> | <a href="sign_in.html">Sign in</a> | <a href="login.html">Login</a>
		</div>
	</header>
	<body bgcolor="DimGrey" >

	<div class="wrapper">

		<div id = "shopgrid" >

			<script>
				var shopgrid = document.getElementById("shopgrid");
				var piclocation = "resources/sadirac.jpg";
				//var articlevar = i;
				for (i = 0; i < 130; i++)
				{
					var articlename = "Sadirac" + i;
					var price = i;
					shopgrid.innerHTML = shopgrid.innerHTML + '\n' + '<a class="element">' + '\n' + '<img src="' + piclocation + '" class = "stuff"/>'  + '\n' + '<div class="name">' + articlename + " | " + price + "\$" + '<form action="index.php" method="POST"><input type="hidden" name="name" value="'+ articlename + '" /><input type="hidden" name="price" value="'+ price + '" /><button type="submit" name="id" value="' + i + '">BUY</button></form>' + '</div>' + '\n' + '\n' + '</a>' + '\n';
				}
			</script>

		</div>
	</div>

	</body>

</html>
