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
			#header("location: lurajcevi_02_login.php?err=401");
	}
if (isset($_GET['id']))
{
	$eventId = $_GET['id'];
}

$xml_output = "<?xml version=\"1.0\"?>\n"; 
$xml_output .=  "<comments>\n";
$sql2 = mysql_query("SELECT * FROM komentar WHERE dogadaj_id_dogadaj = '$eventId'") or die(mysql_error());
while ($cou = mysql_fetch_assoc($sql2)) 
{
	$sql1 = mysql_query("SELECT username FROM korisnik WHERE id_korisnika = '".$cou['korisnik_id_korisnik']."'");
	$row2 = mysql_fetch_array($sql1);
	$xml_output .=  "<comment>\n";
	$xml_output .=  "\t\t<id>" . $cou['id_komentar'] . "</id>\n";
	$xml_output .=  "\t\t<username>" . $row2['username'] . "</username>\n"; 
	$xml_output .=  "\t\t<text>" . $cou['tekst_komentara'] . "</text>\n"; 
	$xml_output .=  "\t\t<vrijeme>" . $cou['vrijeme'] . "</vrijeme>\n";
	$xml_output .=  "</comment>\n"; 	
};

$xml_output .=  "</comments>\n";
$smarty->assign("XMLdata", $xml_output);
$smarty->display("commentsXML.tpl");

?>













