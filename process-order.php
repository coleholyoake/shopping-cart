<?php
	
	session_start();

	//connect to the database
		$dbc = new mysqli('localhost', 'root', '', 'shopping_cart');


	require '../secret.php';

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

	//calculate the total order price
	$grandTotal = 0;

	foreach ( $_SESSION['cart'] as $product) {
		
		$grandTotal += $product['quantity'] * $product['price'];

	};


//prepare the order as a pending state
$name = $dbc->real_escape_string($_POST['full-name']);
$email = $dbc->real_escape_string($_POST['email']);
$phone = $dbc->real_escape_string($_POST['phone']);
$suburb = $dbc->real_escape_string($_POST['suburb']);
$address = $dbc->real_escape_string($_POST['address']);

$sql = "INSERT INTO orders VALUES(NULL, '$name', $suburb, '$address', '$phone', '$email', 'pending')";

//run the query
$dbc->query($sql);

//get the id of this order
$orderID = $dbc->insert_id;

//loop over the cart contents and add them to the products table
foreach ($_SESSION['cart'] as $product) {

	$productID = $product['id'];
	$quantity = $product['quantity'];
	$price = $product['price'];
	
	$sql = "INSERT INTO orders_products VALUES(NULL, $productID, $orderID, $quantity, $price)";

	//run th equery
	$dbc->query($sql);
}

//require PxPay library
require 'PxPay_Curl.inc.php';

//create an instance of the PxPay class
$pxpay = new PxPay_Curl('https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY);

//create instance of request object
$request = new PxPayRequest();

//get the etxt values of the cities and suburb for the transaction

//populate the request with transaction detaills
$request->setAmountInput( $grandTotal);
$request->setTxnType('Purchase');
$request->setCurrencyInput('NZD');
$request->setUrlSuccess('http://localhost/~cole.holyoake/shopping-cart/transaction-success.php');
$request->setUrlFail('http://localhost/~cole.holyoake/shopping-cart/transaction-fail.php');
$request->setTxnData1($_POST['full-name']);
$request->setTxnData2($_POST['phone']);
$request->setTxnData3($_POST['email']);

//convert the request object into XML
$requestString = $pxpay->makeRequest($request);

//send the request away and wait for a response
$response = new mifMessage($requestString);

//extract the url from the response and redirect the user
$url = $response->get_element_text('URI');

//redirect our visitor
header('Location: ' .$url);













