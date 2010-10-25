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
         *
         * @see config.php
         *   all parameters from config.php can be replaced from here
         */
        $ePayPaymentOptions = array(
            'totalAmount'   => 50,
            'amount'        => 40,
            'merchantId'    => 'ntc',
            'transactionId' => 'abc',
        );

        $this->class->setGateway('esewa_epay');
        $this->class->setGatewayOptions($ePayPaymentOptions);
        $outputHtml = $this->class->createPayment();
    }
}
?>
