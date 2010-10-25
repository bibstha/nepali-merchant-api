<?php

// We only need to include the main api class file
require_once('../src/NepaliMerchantApi.php');

// instantiate the api class
$nepaliMerchantApi = new NepaliMerchantApi();

// set parameters for ePay
$ePayPaymentOptions = array(
    'totalAmount'   => 50,
    'amount'        => 40,
    'merchantId'    => 'ntc',
    'transactionId' => 'abc',
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