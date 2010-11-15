<?php

// We only need to include the main api class file
require_once('../src/NepaliMerchantApi.php');

// instantiate the api class
$nepaliMerchantApi = new NepaliMerchantApi();

// form a return url
print_r($_SERVER);
$returnUrl = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . "/paramDebug.php";

// set parameters for ePay
$niblEpaymentOptions = array(
    'AMT' => 2000,
    'PRN' => 'nepalimerchantapi',
    'RU'  => $returnUrl,
);

// set Gateway for api as epay
$nepaliMerchantApi->setGateway('nibl_epayment');

// assign the options
$nepaliMerchantApi->setGatewayOptions($niblEpaymentOptions);

// get the redirect code
$outputHtml = $nepaliMerchantApi->createPayment();

// display the redirect code
print $outputHtml;

// If you browse localhost/urltonepalimerchantapi/example/esewa_example.php
// You would be redirected to the esewa's account.