<?php
require_once('NepaliMerchantApi/Gateway/EsewaEpay.php');

/**
 * Description of EsewaEpayTest
 *
 * @author Bibek Shrestha <bibekshrestha@gmail.com>
 */
class NepaliMerchantApi_Gateway_EsewaEpayTest extends PHPUnit_Framework_TestCase
{
    protected $class;

    public function setUp()
    {
        $this->class = new NepaliMerchantApi_Gateway_EsewaEpay();
    }

    public function testOptions()
    {
        // test default options
        // default options should have at minimum following keys set
        // see config.php for more details
        $expectedKeys = array(
            'isTest',
            'testSuccessUrl',
            'testFailureUrl',
            'successUrl',
            'failureUrl',
            'postUrl',
            'testPostUrl',
        );
        $options = $this->class->getOptions();

        foreach ($expectedKeys as $key) {
            $this->assertTrue(isset ($options[$key]), "Asserting default options array has key '$key'");
        }

        // test merging option
        $sampleOptions = array(
            'a' => 'value of a',
            'b' => 'value of b',
        );
        $this->class->setOptions($sampleOptions);
        $expectedOptions = array_merge($options, $sampleOptions);
        $this->assertEquals($expectedOptions, $this->class->getOptions());
    }

    public function testBadOptionTypeThrowsException()
    {
        $this->setExpectedException('Exception');
        $this->class->setOptions('dummy string, where array should have been passed');
    }

    public function testCreatePayment()
    {
        $options = array(
            'totalAmount'   => 500,
            'amount'        => 400,
        );

        $this->class->setOptions($options);
        $outputHtml = $this->class->createPayment();

        $expectedOutput = <<<EOT
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
      post_to_url("http://localhost", {"tAmt":500,"amt":400,"su":"http:\/\/localhost\/success","fu":"http:\/\/localhost\/failure"});
    </script>
  </body>
</html>

EOT;
        $this->assertEquals($expectedOutput, $outputHtml);
    }
}
?>
