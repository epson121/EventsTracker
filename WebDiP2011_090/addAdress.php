<?php
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();
spojiSeNaBazu();

//ako je  postavljeno ime korisnika
if (isset($_GET['uname']))
{
	$user = $_GET['uname'];
}

//dodaj formu za dodavanje adrese
$z = "<form id = 'addCC' method = 'post' action = 'addAdress2.php?uname=$user'><br/>Adresa:<br/>";
$z .= "<input type = 'text' name = 'adressName' id = 'adressName'/><br/>";
$z .= "<input type = 'submit' name = 'ok'/></form>";
echo $z;

?>