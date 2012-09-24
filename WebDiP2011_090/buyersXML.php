<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_GET['id']))
{
	$eventId = $_GET['id'];
}
$xml_output = "<?xml version=\"1.0\"?>\n"; 
$xml_output .=  "<kupci>\n";
$sql2 = mysql_query("SELECT korisnik_id_korisnika FROM kupljeni_dogadjaji WHERE dogadaj_id_dogadaj = '$eventId'") or die(mysql_error());
while ($cou = mysql_fetch_assoc($sql2)) 
{
	$sql1 = mysql_query("SELECT username FROM korisnik WHERE id_korisnika = '".$cou['korisnik_id_korisnika']."'");
	$row2 = mysql_fetch_array($sql1);
	$xml_output .=  "<kupac>\n";
	$xml_output .=  "\t\t<username>" . $row2['username'] . "</username>\n"; 
	$xml_output .=  "</kupac>\n"; 	
};

$xml_output .=  "</kupci>\n";
$smarty->assign("XMLdata", $xml_output);
$smarty->display("buyersXML.tpl");

?>













