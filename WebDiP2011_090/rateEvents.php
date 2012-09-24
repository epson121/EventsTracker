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
if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
{
	$user = $_SESSION['korisnik'];
}
if (isset($_GET['id']))
{
	$eventId = $_GET['id'];
}
if (isset($_GET['rate']))
{
	$eventRate = $_GET['rate'];
}
//provjera je li vec glasao, ako jest da promijeni njegov glas. :)

//trazenje ID-a trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$user'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
$row = mysql_fetch_assoc($sql);
$user = $row['id_korisnika'];

//pretraga u tablici ocijenjeniih je li ovaj vec glasao
$upit = "SELECT * FROM ocijenjeni_dogadaji WHERE korisnik_id_korisnika = '$user' AND dogadaj_id_dogadaj = '$eventId'";
$upit = mysql_query($upit);
if (mysql_num_rows($upit) > 0)
{
	$sql2 = mysql_query("UPDATE ocijenjeni_dogadaji SET ocjena = '$eventRate' WHERE korisnik_id_korisnika = '$user' AND dogadaj_id_dogadaj = '$eventId' ") or die(mysql_error());
}
else 
{
	$sql2 = mysql_query("INSERT into ocijenjeni_dogadaji(korisnik_id_korisnika, dogadaj_id_dogadaj, ocjena) VALUES('$user', '$eventId', '$eventRate')") or die(mysql_error());
}

?>





