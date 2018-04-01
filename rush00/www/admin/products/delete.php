<?php
include("../../includes/utils.php");
include("../../includes/database.php");
session_start();

restrict_access(1, "/");
if (isset($_GET['item']))
	database_product_delete($_GET['item']);
header("Location: ./");
