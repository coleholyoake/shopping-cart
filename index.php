	<?php

		include 'templates/header.template.php';

	?>

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

			//present the data, include template
			include 'templates/product.template.php';
		}

		include 'templates/footer.template.php';
	?>


