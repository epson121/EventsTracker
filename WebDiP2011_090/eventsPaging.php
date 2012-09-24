<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

/*
if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		$tipKorisnika = $_SESSION['tip'];
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar'] );
		
	}
	
	else {
			header("location: lurajcevi_02_login.php?err=401");
	
	}
*/



$sql = mysql_query("SELECT * FROM dogadaj WHERE status_dogadjaja = 1") or die (mysql_error());
$nrow = mysql_num_rows($sql);




$xml_output = "<?xml version=\"1.0\"?>\n"; 
$xml_output .=  "<events>\n";
while($row = mysql_fetch_assoc($sql)) 
{
	$sql2 = mysql_query("SELECT username FROM korisnik WHERE id_korisnika = '$row[korisnik_id_korisnika]'");
	$row2 = mysql_fetch_array($sql2);
	$xml_output .=  "<event>\n";
	$xml_output .=  "\t\t<rb>" . $row['id_dogadaj'] . "</rb>\n"; 
	$xml_output .=  "\t\t<autor>" . $row2['username'] . "</autor>\n";
	//$xml_output .=  "\t\t<kategorija>" . $row['kategorija_id_kategorije'] . "</kategorija>\n";
	$xml_output .=  "\t\t<naziv>" . $row['naziv_dogadaja'] . "</naziv>\n";
	$xml_output .=  "\t\t<opis>" . $row['opis_dogadaja'] . "</opis>\n";
	$xml_output .=  "\t\t<datum>" . $row['datum_dogadjaja'] . "</datum>\n";
	$xml_output .=  "\t\t<vrijeme>" . $row['vrijeme_pocetka'] . "</vrijeme>\n";
	$xml_output .=  "\t\t<cijena>" . $row['cijena_karte'] . "</cijena>\n";
	$xml_output .=  "\t\t<mjesto>" . $row['mjesto'] . "</mjesto>\n";
	$xml_output .=  "</event>\n";
}
$xml_output .=  "</events>\n";
$smarty->assign("XMLdata", $xml_output);
$smarty->display("eventsXML.tpl")

/*
$smarty->assign("xmlData", $xml_output);
$smarty->display("eventsPage.tpl");
*/
?>