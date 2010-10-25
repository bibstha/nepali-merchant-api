<?php
require_once('NepaliMerchantApi.php');


/**
 * Description of NepaliMerchantApi
 *
 * @author bibek
 */
class NepaliMerchantApiTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->class = new NepaliMerchantApi();
    }
    
    public function testSetGateway()
    {
        $this->class->setGateway('dummy');
        $this->assertTrue(true, 'Can set gateway');
    }

    public function testMakeEsewaEpayPayment()
    {
        /**
         * These options are merged into default parameter
         */
        $ePayPaymentOptions = array(
            'isTest'          => true, // uses test or real url
            'total_amount'  => 50,
            'amount'        => 40,
            'subscriber_id' => 'ntc',
            'transaction_id'=> 'abc',
//            'success_url' <- set by the module
//            'failure_url' <- set by the module
        );

        $this->class->setGateway('esewa_epay');
        $this->class->setGatewayOptions($ePayPaymentOptions);
        $this->class->createPayment();
    }
}
?>
