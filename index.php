	<?php

		//start session
		session_start();

		//connect to the database
		$dbc = new mysqli('localhost', 'root', '', 'shopping_cart');

		//create cart if they do not have one already
		if (! isset($_SESSION['cart'])) {
			
			//create the cart
			$_SESSION['cart'] = [];
		}

		//if clearcart is in the address bar(GET)
		if (isset($_GET['clearcart'])) {
			
			//clear the cart
			$_SESSION['cart'] = [];

			//redirect
			header('Location: index.php');
		}

		//did the user submit form
		if (isset($_POST['add-to-cart'])) {

			//find out the price
			$id = $dbc->real_escape_string($_POST['product-id']);

			//prepare sqlto find the price
			$sql = "SELECT price FROM products WHERE id = $id";

			//run query
			$result = $dbc->query($sql);

			//validation
			//extract the data
			$result = $result->fetch_assoc();

			
			//add the item to the cart
			$_SESSION['cart'][] = [
				'id'			=>	$_POST['product-id'],
				'name'			=>	$_POST['product-name'],
				'description'	=>	$_POST['product-description'],
				'price'			=>	$result['price']
				];
		}

		include 'templates/header.template.php';

	?>

	<h1>Products</h1>

	<?php
		

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


