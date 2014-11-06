<?php
include(__DIR__."/../vendor/autoload.php");

$qty = $_POST['qty'];
$price = $_POST['price'];

$amount = $qty*$price;

$s = new OtterFarm\Store;
$response = $s->requestPayment($amount);

var_dump( $response );