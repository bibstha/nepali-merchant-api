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
    protected $_config;
    protected $_gateway = null;

    public function getConfig()
    {
        return $this->_config;
    }

    public function setConfig($config)
    {
        $this->_config = $config;
    }

    public function __construct()
    {
        /**
         * Strange that require_once does not work here
         *
         * require_once makes the multiple testFunctions in the TestCase to fail
         */
        require(NMA_ROOT . DS . 'config.php');
        $this->_config = $config;
    }
    
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
            $gateway = $gatewayFactory->getGateway($gateway, $this->_config);
            $this->_gateway = $gateway;
        }
        elseif ($gateway instanceof NepaliMerchantApi_Gateway_Abstract) {
            $this->_gateway = $gateway;
        }
        else {
            throw new Exception('Invalid Gateway Set');
        }
    }

    /**
     * Returns the gateway
     * 
     * @return NepaliMerchantApi_Gateway_Abstract
     */
    public function getGateway()
    {
        return $this->_gateway;
    }

    public function setGatewayOptions($options)
    {
        $this->_gateway->setOptions($options);
    }

    public function createPayment()
    {
        return $this->_gateway->createPayment();
    }
}
