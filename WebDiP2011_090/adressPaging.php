<?php
session_start();
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();
spojiSeNaBazu();

if(isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		$username = $_SESSION['korisnik'];
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}
//ako je promijenjea vrijednost u formi, promijeni ju i u bazi
if (isset($_POST['ok']))
{
	$addr = $_POST['adress'];
	$idAddr = $_POST['idAddress'];
	$idUser = $_POST['idUser'];
	$ch = mysql_query("UPDATE korisnik_adresa SET adresa = '$addr' WHERE id_adresa= '$idAddr' AND korisnik_id_korisnika = '$idUser'") or die(mysql_error());
}

//id trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$username'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
while ($row = mysql_fetch_assoc($sql))
	{
		$user2 = $row['id_korisnika'];
	}

//izlistaj sve adrese	
$sql = mysql_query("SELECT * FROM korisnik_adresa WHERE korisnik_id_korisnika = '$user2'");
while ($row = mysql_fetch_assoc($sql))
{
	$adress[] = $row;
}



$smarty->assign("action", $_SERVER['PHP_SELF']);
$smarty->assign("users", $adress);
$smarty->display("adressPaging.tpl");
	
	
?>