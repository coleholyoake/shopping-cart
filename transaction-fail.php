<?php

session_start();

require 'PxPay_Curl.inc.php';
require '../secret.php';

//create an instance of the PxPay class
$pxpay = new PxPay_Curl('https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY);

//convert the response into something we can use 
$response = $pxpay->getResponse($_GET['result']);

//was the transaction unsuccessfull
if($response->getSuccess() == 0){

	//update the database order to say paid
	echo "<pre>";
	print_r($response);

	//email the client

     
}