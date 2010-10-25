<?php

require_once('NepaliMerchantApi/Gateway/Abstract.php');

/**
 * Description of EsewaEpay
 *
 * @author Bibek Shrestha <bibekshrestha@gmail.com>
 */
class NepaliMerchantApi_Gateway_EsewaEpay extends NepaliMerchantApi_Gateway_Abstract
{
    /**
     * @var array config
     */
    protected $options;
    
    public function __construct()
    {
        global $config;
        $this->options = $config['paymentGateway']['esewaEpay'];
    }

    /**
     * Set the options to NepaliMerchantApi.
     *
     * Available options are
     * - totalAmount
     * - amount
     * - taxAmount
     * - productServiceCharge
     * - productDeliverCharge
     * - merchantId
     * - transactionId
     * - successUrl
     * - failureUrl
     * - isTest
     * - testSuccessUrl
     * - testFailureUrl
     *
     * @see http://f1soft-host.com/checkout_esewa.php
     * 
     * @param array $options
     *
     * @todo Write more info from website for individual parameters
     */
    public function setOptions($options)
    {
        if (!is_array($options)) {
            throw new Exception("Argument 'options' should be of type array");
        }

        $this->options = array_merge($this->options, $options);
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function createPayment()
    {
        
    }
}
?>
