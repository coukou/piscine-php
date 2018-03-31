<?php
session_start();
print_r($_SESSION);
if (isset($_POST['type']) && isset($_POST['id']))
{
  if ($_POST['type'] === "all" ||
  ($_POST['type'] === "one" && $_SESSION['cart'][$_POST['id']]['amount'] == "1"))
    unset($_SESSION['cart'][$_POST['id']]);
    else
      $_SESSION['cart'][$_POST['id']]['amount'] -= 1;
}


header("Location:cart.php");
?>
