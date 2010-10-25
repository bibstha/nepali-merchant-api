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
}
?>
