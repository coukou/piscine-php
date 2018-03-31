<?php
include "cart_func.php";
session_start();
 ?>
 <html>
 	<head>
 		<meta charset="UTF-8">
 		<link rel="stylesheet" href="responsive.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
 	<body bgcolor="Grey" >
		<div class="articlewrapper">
		<?php print_cart(); ?>
		<div style="
    width:100%;
    padding: 10px;
    display:inline-block;">
			<div class="articledata">Cart is<br /><div class="price"><?php echo cart_count()[1];?></div></div>
      <div style="position:absolute; right:1em;">
			<form action="#" method="post">
				<button type="submit" name="data" value="yes">Checkout</button>
			</form>
    </div>
		<script src ="button.js"> </script>
	</div>
 	</body>

 </html>
