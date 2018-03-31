<?php

include("./includes/database.php");

$products = database_product_get_all();
print_r($products);
