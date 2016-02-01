
<ul>
	<li>ID: <?= $row['id']; ?></li>
	<li>Name: <?= $row['name']; ?></li>
	<li>Description: <?= $row['description']; ?></li>
	<li>Price: <?= $row['price']; ?></li>
	<li>Stock: <?= $row['stock']; ?></li>
	<li>
		<form action="" method="POST">
			<input type="hidden" name="product-id" value="<?= $row['id']; ?>">
			<input type="hidden" name="product-name" value="<?= $row['name']; ?>">
			<input type="hidden" name="product-description" value="<?= $row['description']; ?>">
			<label for="quantity">Quantity</label>
			<input type="number" id="quantity" name="quantity" step="1" value="1" min="1" max="<?= $row['stock']; ?>">
			<input type="submit" name="add-to-cart" value="Add to cart">
		</form>
	</li>
</ul>

