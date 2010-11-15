<?php

$config['paymentGateway']['esewaEpay'] = array(
    'isTest'              => false,
    'testSuccessUrl'    => 'http://localhost/test/success',
    'testFailureUrl'    => 'http://localhost/test/failure',
    'successUrl'        => 'http://localhost/success',
    'failureUrl'        => 'http://localhost/failure',
    'postUrl'           => 'http://localhost',
    'testPostUrl'       => 'http://localhost/test',
);

/**
 * @todo refactor the default settings inside the class file
 */
$config['paymentGateway']['niblEpayment'] = array(
    'BankId'        => '004',
    'MD'            => "P",
    'PID'           => '000000000082',
    'ITC'           => 'NepaliMerchantApi',
    'CRN'           => 'NPR',
    'CG'            => 'N',
    'USER_LANG_ID'  => '001',
    'UserType'      => '1',
    'AppType'       => 'retail',

    // For Test Purpose
    // 'RU'            => 'http://localhost',
    // 'postUrl'       => 'http://202.63.245.70/BankAwayRetail/sgonHttpHandler.aspx?Action.ShoppingMall.Login.Init=Y?',

    // For Real Purpose
    'RU'            => 'http://localhost/',
    'postUrl'       => 'http://202.63.245.70/BankAwayRetail/sgonHttpHandler.aspx?Action.ShoppingMall.Login.Init=Y?',
);