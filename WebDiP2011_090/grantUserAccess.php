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
			if (isset($_GET['user'])) 
			{
				$u = $_GET['user'];
			}
			if (isset($_GET['ev'])) 
			{
				$e = $_GET['ev'];
			}
			$smarty->assign("admin", $_SESSION['admin']);
			$sql = mysql_query("DELETE FROM onemogucen_pristup WHERE korisnik = '$u' and dogadaj_id_dogadaj = '$e'");
			$sql = mysql_query("SELECT * FROM onemogucen_pristup");
			while ($row = mysql_fetch_assoc($sql))
			{
				$users[] = $row;
			}
			$smarty->assign("grantedAccess", "Korisniku je omogućen pristup.");
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}



$smarty->assign("users", $users);
$smarty->display("deniedUsersPaging.tpl");
	
	
?>