<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

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
		$user = $_SESSION['korisnik'];
	}
	else {
			header("location: lurajcevi_02_login.php?err=401");
	}
	
//id trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$user'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
while ($row = mysql_fetch_assoc($sql))
	{
		$user2 = $row['id_korisnika'];
	}

$xml_output = "<?xml version=\"1.0\"?>\n"; 
$xml_output .=  "<events>\n";
$sql2 = mysql_query("SELECT dogadaj_id_dogadaj, broj_ulaznica, prijevoz, nocenje FROM kupljeni_dogadjaji WHERE korisnik_id_korisnika = '$user2'") or die(mysql_error());
while ($cou = mysql_fetch_assoc($sql2)) 
{
	$sql1 = mysql_query("SELECT naziv_dogadaja FROM dogadaj WHERE id_dogadaj = '".$cou['dogadaj_id_dogadaj']."'");
	$row2 = mysql_fetch_array($sql1);
	$xml_output .=  "<event>\n";
	$xml_output .=  "\t\t<name>" . $row2['naziv_dogadaja'] . "</name>\n"; 
	$xml_output .=  "\t\t<ticketNo>" . $cou['broj_ulaznica'] . "</ticketNo>\n"; 
	$xml_output .=  "\t\t<prijevoz>" . $cou['prijevoz'] . "</prijevoz>\n"; 
	$xml_output .=  "\t\t<nocenje>" . $cou['nocenje'] . "</nocenje>\n"; 
	$xml_output .=  "</event>\n"; 	
};

$xml_output .=  "</events>\n";
$smarty->assign("XMLdata", $xml_output);
$smarty->display("buyersXML.tpl");

?>













