<?php
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();

$z = "<form id = 'insertUsername' method = 'post' action = 'forgottenPassword2.php'><br/>Unesite korisničko ime:<br/>";
$z .= "<input type = 'text' name = 'username' id = 'username'/><br/>";
$z .= "<input type = 'submit' name = 'ok'/></form>";
echo $z;
?>