<?php

class NepaliMerchantApi_Gateway_NiblEpayment extends NepaliMerchantApi_Gateway_Abstract
{
    protected $_options = array(
        'BankId'        => null,
        'MD'            => null,
        'PID'           => null,
        'ITC'           => null,
        'CRN'           => null,
        'RU'            => null,
        'CG'            => null,
        'USER_LANG_ID'  => null,
        'UserType'      => null,
        'AppType'       => null,
        'AMT'           => null,
        'PRN'           => null,
    );

    protected $_isTest = false;

    protected $_postUrl = null;
    
    public function init()
    {
        // config is available with $this->getConfig();
        $config = $this->getConfig();

        // Setting Options to be sent in POST
        foreach (array_keys($this->_options) as $key) {
            if (isset($config['paymentGateway']['niblEpayment'][$key])) {
                $this->_options[$key] = $config['paymentGateway']['niblEpayment'][$key];
            }
        }

        // Setting Urls
        $this->_postUrl = $config['paymentGateway']['niblEpayment']['postUrl'];
    }

    /**
     * The function is called by NepaliMerchantApi for setting individual transaction related parameneters
     */
    public function  setOptions($options)
    {
        foreach (array_keys($this->_options) as $key) {
            if (isset($options[$key])) {
                $this->_options[$key] = $options[$key];
            }
        }

        if (isset($options['postUrl'])) {
            $this->_postUrl = $options['postUrl'];
        }
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function createPayment()
    {
        $postVars = $this->_options;
        $postUrl = $this->_postUrl;
        
        // the view file will have access to $postVars and $postUrl
        /**
         * Again require_once does not work here. Need to check
         * where to and where not to use require_once
         */
        ob_start();
        require('NiblEpayment/redirect.phtml');
        $output = ob_get_clean();
        return $output;
    }
}