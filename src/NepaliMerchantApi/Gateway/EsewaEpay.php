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
    protected $options = array();
    
    public function init()
    {
        $config = $this->getConfig();
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
     * - postUrl
     * - isTest
     * - testSuccessUrl
     * - testFailureUrl
     * - testPostUrl
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
        if ($this->options['isTest']) {
            $postUrl = $this->options['testPostUrl'];
        } else {
            $postUrl = $this->options['postUrl'];
        }

        $postVarKeys = array(
            'tAmt' => 'totalAmount',
            'amt'  => 'amount',
            'txAmt' => 'taxAmount',
            'psc' => 'productServiceCharge',
            'pdc' => 'productDeliverCharge',
            'scd' => 'merchantId',
            'pid' => 'transactionId',
        );

        if ($this->options['isTest']) {
          $postVarKeys['su'] = 'testSuccessUrl';
          $postVarKeys['fu'] = 'testFailureUrl';
        } else {
          $postVarKeys['su'] = 'successUrl';
          $postVarKeys['fu'] = 'failureUrl';
        }
        
        $postVars = array();
        foreach ($postVarKeys as $postKey => $optionKey) {
            if (isset($this->options[$optionKey])) {
                $postVars[$postKey] = $this->options[$optionKey];
            }
        }

        // the view file will have access to $postVars and $postUrl
        /**
         * Again require_once does not work here. Need to check
         * where to and where not to use require_once
         */
        ob_start();
        require('EsewaEpay/redirect.phtml');
        $output = ob_get_clean();
        return $output;
    }
}
?>
