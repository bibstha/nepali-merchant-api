<?php
require_once('NepaliMerchantApi/Gateway/Factory.php');

/**
 * Description of FactoryTest
 *
 * @author bibek
 */
class NepaliMerchantApi_Gateway_FactoryTest extends PHPUnit_Framework_TestCase
{
    var $class;

    public function setUp()
    {
        $this->class = new NepaliMerchantApi_Gateway_Factory();
    }

    public function testGetGateways()
    {
        $gatewayMap = array(
            'dummy'         => 'NepaliMerchantApi_Gateway_Dummy',
            'esewa_epay'    => 'NepaliMerchantApi_Gateway_EsewaEpay',
        );

        foreach (array_keys($gatewayMap) as $gatewayName) {
            $gateway = $this->class->getGateway($gatewayName);
            
            $this->assertTrue($gateway instanceof $gatewayMap[$gatewayName], "Asserting gateway $gatewayName " .
                "instance of $gatewayMap[$gatewayName]");

            $this->assertTrue($gateway instanceof NepaliMerchantApi_Gateway_Abstract,
                "Asserting $gatewayName extends NepaliMerchantApi_Gateway_Abstract");
        }
    }
}
?>
