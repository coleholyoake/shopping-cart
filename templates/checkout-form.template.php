<h2>Please fill out this form</h2>

<form action="process-order.php" method="POST">
	<div>
		<label for="full-name">Full Name:</label>
		<input type="text" id="full-name" name="full-name" placeholder="Homer Simpson">
	</div>

	<div>
		<select id="cities" name="city">
				<option value="">Please select a city... </option>
				<?php

				//connect to database
				$dbc = new mysqli('localhost', 'root', '', 'cities_and_suburbs');

				//get all the cities
				$sql = "SELECT cityID, cityName FROM cities";

				//run the query
				$result = $dbc->query($sql);

				//loop over the result and create and create an option element for each
				while( $city = $result->fetch_assoc() ) {
					echo '<option value="'.$city['cityID'].'">'.$city['cityName'].'</option>';
				}

				?>
			</select>
		<select id="suburbs" name="suburb"></select>
	</div>
	<div>
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" placeholder="742 Evergreen Terrace">
	</div>
	<div>
		<label for="phone">Phone Number:</label>
		<input type="tell" id="phone" name="phone" placeholder="555-7334">
	</div>
	<div>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" placeholder="chunkylover53@aol.com">
	</div>
	<input type="submit" name="place-order" value="Place Order">	
</form>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="js/cities_and_suburbs.js"></script>