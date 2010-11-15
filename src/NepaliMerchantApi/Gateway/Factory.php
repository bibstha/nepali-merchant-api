<?php
require_once 'NepaliMerchantApi/Gateway/Dummy.php';
require_once 'NepaliMerchantApi/Gateway/EsewaEpay.php';
require_once 'NepaliMerchantApi/Gateway/NiblEpayment.php';

/**
 * Description of Factory
 *
 * @author bibek
 */
class NepaliMerchantApi_Gateway_Factory
{
    public function getGateway($gateway, $config = array())
    {
        switch ($gateway) {
            case 'dummy':
                return new NepaliMerchantApi_Gateway_Dummy($config);
                break;

            case 'esewa_epay':
                return new NepaliMerchantApi_Gateway_EsewaEpay($config);
                break;

            case 'nibl_epayment':
                return new NepaliMerchantApi_Gateway_NiblEpayment($config);
                break;

            default:
                throw new Exception('Gateway Not Found');
        }
    }
}
?>
