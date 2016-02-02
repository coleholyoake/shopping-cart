<?php

//connect to database
$dbc = new mysqli('localhost', 'root', '', 'cities_and_suburbs');

//filter the data
//capture the city id
$cityID = $dbc->real_escape_string($_GET['city']);

//prepare SQL
$sql = "SELECT suburbID, suburbName FROM suburbs WHERE cityID = $cityID";

//capture the result
$result = $dbc->query($sql);

//extrect the result
//convert the data into JSON
$suburbs = json_encode($result->fetch_all(MYSQLI_ASSOC));

//convert the data into JSON
header('Content-Type: application/json');

echo $suburbs;