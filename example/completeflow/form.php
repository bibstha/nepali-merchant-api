<?php
session_start();
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
$successUrl = $baseUrl . '/success.php';
$failureUrl = $baseUrl . '/failure.php';

?>
<html>
    <head>
        <title>Esewa Test</title>
    </head>
    <body>
        <form name="frmCheckout2" id="frmCheckout2" method="post" action="esewaProcess.php">
            <table>
                <tbody><tr><td align="center" colspan="2"><b>Your Order
                                form</b><br><br></td></tr>
                    <tr><td>Total Amount(tAmt): </td><td><input type="text" value="20" name="tAmt" size="40"></td></tr>
                    <tr><td>Amount(amt): </td><td><input type="text" value="10" name="amt" size="40"></td></tr>
                    <tr><td>Tax Amount(txAmt): </td><td><input type="text" value="10" name="txAmt" size="40"></td></tr>

                    <tr><td>Produce service charge(psc): </td><td><input type="text" name="psc" size="40" value="0"></td></tr>
                    <tr><td>Produce delivery charge(pdc): </td><td><input type="text" name="pdc" size="40" value="0"></td></tr>
                    <tr><td>MerchantID(scd): </td><td><input type="text" name="scd" size="40" value="muncha"></td></tr>
                    <tr><td>ProductID/OrderID(pid): </td><td><input type="text" name="pid" size="40" value="001254"></td></tr>

                    <tr>
                        <td>Success URL(su): </td>
                        <td><input type="text" name="su" value="<?php print $successUrl; ?>" size="80"></td></tr>
                    <tr>
                        <td>Failure URL(fu): </td>
                        <td><input type="text" name="fu" value="<?php print $failureUrl; ?>" size="80"></td></tr>
                    <tr><td align="center" colspan="2"><input type="submit" value="Confirm">   </td></tr>


                </tbody>
            </table>
        </form>
    </body>
</html>
<pre>
<?php
print "BEFORE:\n";
print_r($_SESSION);
print "AFTER:\n";
$_SESSION['name'] = date("Y-m-d h:i:s");
print_r($_SESSION);
?>
</pre>