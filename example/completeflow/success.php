<?php
session_start();
?>
<pre>
<?php
print "POST VARS\n";
print_r($_POST);

print "GET VARS\n";
print_r($_GET);
?>
<?php
print "BEFORE:\n";
print_r($_SESSION);
print "AFTER:\n";
$_SESSION['name'] = date("Y-m-d h:i:s");
print_r($_SESSION);
?>
</pre>
