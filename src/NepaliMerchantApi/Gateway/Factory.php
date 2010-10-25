<?php
require_once 'NepaliMerchantApi/Gateway/Dummy.php';
require_once 'NepaliMerchantApi/Gateway/EsewaEpay.php';

/**
 * Description of Factory
 *
 * @author bibek
 */
class NepaliMerchantApi_Gateway_Factory
{
    public function getGateway($gateway)
    {
        switch ($gateway) {
            case 'dummy':
                return new NepaliMerchantApi_Gateway_Dummy();

            case 'esewa_epay':
                return new NepaliMerchantApi_Gateway_EsewaEpay();
                
            case 'default':
                throw new Exception('Gateway Not Found');
        }
    }
}
?>
