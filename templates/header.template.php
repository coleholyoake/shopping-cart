<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<?php
		echo '<pre>';
		//show the contents of the cart
		print_r($_SESSION['cart']);
		echo '</pre>';
	?>