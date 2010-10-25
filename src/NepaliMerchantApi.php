<?php
require_once('bootstrap.php');
require_once('NepaliMerchantApi/Gateway/Factory.php');
require_once('NepaliMerchantApi/Gateway/Abstract.php');

/**
 * Description of NepaliMerchantApi
 *
 * @author bibek
 */
class NepaliMerchantApi
{
    /**
     *
     * @param NepaliMerchantApi_Gateway_Abstract|string $gateway
     * 
     * @throws Exception
     */
    public function setGateway($gateway)
    {
        if (is_string($gateway)) {
            $gatewayFactory = new NepaliMerchantApi_Gateway_Factory();
            $gateway = $gatewayFactory->getGateway($gateway);
            $this->gateway = $gateway;
        }
        elseif ($gateway instanceof NepaliMerchantApi_Gateway_Abstract) {
            $this->gateway = $gateway;
        }
        else {
            throw new Exception('Invalid Gateway Set');
        }
    }

    public function setGatewayOptions($options)
    {
        $this->gateway->setOptions($options);
    }

    public function createPayment()
    {
        $this->gateway->createPayment();
    }
}
