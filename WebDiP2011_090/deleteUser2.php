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
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", "mod");
		}
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$mod = $_SESSION['korisnik'];
	}


if (isset($_POST['ok']))
{
	$username = $_POST['username'];
	
	$sql = mysql_query("DELETE FROM korisnik WHERE username = '$username'") or die(mysql_error());
	
	$smarty->assign("successCC", "Uspješno ste obrisali korisnika.");
	$smarty->display("predlozak_tpl.tpl");
}






?>