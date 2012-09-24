<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

$sql2 = mysql_query("SELECT COUNT(ocjena) AS count FROM ocijenjeni_dogadaji WHERE dogadaj_id_dogadaj = '$eventId'") or die(mysql_error());
$sql = mysql_query("SELECT SUM(ocjena) as suma FROM ocijenjeni_dogadaji WHERE dogadaj_id_dogadaj = '$eventId'");

$cou = mysql_fetch_assoc($sql2);
$sum = mysql_fetch_assoc($sql);

$prosjek = $sum['suma']/$cou['count'];
$xml_output = "<?xml version=\"1.0\"?>\n"; 
$xml_output .=  "<ocjene>\n";
	$xml_output .=  "<ocjena>\n";
	$xml_output .=  "\t\t<value>" . $prosjek . "</value>\n";
	$xml_output .=  "</ocjena>\n"; 	
$xml_output .=  "</ocjene>\n";
$smarty->assign("prosjek", $xml_output);
$smarty->dispay("getNewAverageRate.tpl");

?>
