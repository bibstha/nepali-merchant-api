<?php
require('NepaliMerchantApi/Gateway/NiblEpayment.php');

class NepaliMerchantApi_Gateway_NiblEpaymentTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * @var NepaliMerchantApi_Gateway_Abstract
     */
    protected $_class;

    public function setUp()
    {
        /**
         * Include $config variable from config.php
         */
        require NMA_ROOT . '/config.php';
        $this->_class = new NepaliMerchantApi_Gateway_NiblEpayment($config);
    }

    public function testConfigurationSet()
    {
        $options = $this->_class->getOptions();
        // By default following keys need to exist
        $expectedKeys = array('BankId', 'MD', 'PID', 'ITC', 'PRN', 'CRN', 'RU', 'CG', 'AMT'
            // 'UserType', 'AppType', 'USER_LANG'
        );

        foreach ($expectedKeys as $key) {
            $this->assertArrayHasKey($key, $options, 'NiblEpayment options has key ' . $key);
        }
    }

    public function testCreatePayment()
    {
        // Parameter that changes in each transaction
        $options = array(
            'BankId'        => '004',
            'MD'            => "P",
            'PID'           => '000000000082',
            'ITC'           => 'NepaliMerchantApi',
            'CRN'           => 'NPR',
            'RU'            => 'http://mechantapi/returnUrl',
            'CG'            => 'N',
            'USER_LANG_ID'  => '001',
            'UserType'      => '1',
            'AppType'       => 'retail',
            'AMT'           => 12345,
            'PRN'           => 'ClientId',
            'postUrl'       => 'http://nibl-ipaddress/postUrl'
        );

        $this->_class->setOptions($options);

        $output = $this->_class->createPayment();
        $expectedOutput = <<<FORMOUT
<html>
  <body>
    <script type="text/javascript">
      // @see http://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit/3259946#3259946
      function post_to_url(path, params, method) {
        method = method || "post";

        var form = document.createElement("form");

        //move the submit function to another variable
        //so that it doesn't get over written
        form._submit_function_ = form.submit;

        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }

        document.body.appendChild(form);
        form._submit_function_(); //call the renamed function
      }
      post_to_url("http://nibl-ipaddress/postUrl", {"BankId":"004","MD":"P","PID":"000000000082","ITC":"NepaliMerchantApi","CRN":"NPR","RU":"http:\/\/mechantapi\/returnUrl","CG":"N","USER_LANG_ID":"001","UserType":"1","AppType":"retail","AMT":12345,"PRN":"ClientId"});
    </script>
  </body>
</html>

FORMOUT;
        $this->assertEquals($expectedOutput, $output);
    }

//    public function 
}