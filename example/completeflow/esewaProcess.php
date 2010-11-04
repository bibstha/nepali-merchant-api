<?php

// We only need to include the main api class file
require_once('../../src/NepaliMerchantApi.php');

// instantiate the api class
$nepaliMerchantApi = new NepaliMerchantApi();

// set parameters for ePay
$ePayPaymentOptions = array(
    'totalAmount'   => $_POST['tAmt'],
    'amount'        => $_POST['amt'],
    'taxAmount'     => $_POST['txAmt'],
    'productServiceCharge' => $_POST['psc'],
    'productDeliverCharge' => $_POST['pdc'],
    'merchantId'    => $_POST['scd'],
    'transactionId' => $_POST['pid'],
);

// set Gateway for api as epay
$nepaliMerchantApi->setGateway('esewa_epay');

// assign the options
$nepaliMerchantApi->setGatewayOptions($ePayPaymentOptions);

// get the redirect code
$outputHtml = $nepaliMerchantApi->createPayment();

// display the redirect code
print $outputHtml;

// If you browse localhost/urltonepalimerchantapi/example/esewa_example.php
// You would be redirected to the esewa's account.