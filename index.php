<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Products</h1>

	<?php
		//connect to the database
		$dbc = new mysqli('localhost', 'root', '', 'shopping_cart');

		//get all products from the database
		$sql = "SELECT * FROM products";

		//run the query
		$result = $dbc->query($sql);

		//loop over the result
		while ($row = $result->fetch_assoc()) {

			//present the data
			echo '<ul>';
				echo '<li>ID: '.$row['id'].'</li>';
				echo '<li>NAME: '.$row['name'].'</li>';
				echo '<li>DESCRIPTION: '.$row['description'].'</li>';
				echo '<li>PRICE: '.$row['price'].'</li>';
				echo '<li>STOCK: '.$row['stock'].'</li>';
			echo '</ul>';
		}
	?>


	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>