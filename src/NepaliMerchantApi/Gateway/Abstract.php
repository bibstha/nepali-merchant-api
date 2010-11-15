<?php

/**
 * Description of Abstract
 *
 * @author bibek
 */
abstract class NepaliMerchantApi_Gateway_Abstract
{
    protected $_config = array();
    
    abstract public function setOptions($options);

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct($config = array())
    {
        $this->_config = $config;
        $this->init();
    }

    /**
     * Init function, acts as a placeholder
     *
     * Allows sub class to have extra initialization function
     */
    public function init()
    {
        
    }

    public function setConfig($config)
    {
        $this->_config = $config;
    }

    public function getConfig()
    {
        return $this->_config;
    }
}
?>
