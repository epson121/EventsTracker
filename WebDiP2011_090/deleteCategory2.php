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
	$catName = $_POST['catName'];
	
	$sql = mysql_query("DELETE FROM kategorija WHERE naziv_kategorije = '$catName'") or die(mysql_error());
	
	$smarty->assign("successCC", "Uspješno ste obrisali kategoriju.");
	$smarty->display("predlozak_tpl.tpl");
}






?>