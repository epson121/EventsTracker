<?php
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();
spojiSeNaBazu();

//ako je postavljeno ime osobe koja dodati karticu
if (isset($_GET['uname']))
{
	$user = $_GET['uname'];
}


//dodaj formu za dodavanje kartice
$z = "<form id = 'addCC' method = 'post' action = 'addCreditCard2.php?uname=$user'><br/>Naziv kartice:<br/>";
$z .= "<input type = 'text' name = 'ccName' id = 'ccName'/><br/><input type = 'text' name = 'ccNumber' id = 'ccNumber'/><br/>";
$z .= "<input type = 'submit' name = 'ok'/></form>";
echo $z;






?>