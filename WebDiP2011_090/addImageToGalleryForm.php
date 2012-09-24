<?php

	session_start();
	include 'spajanje.php';
	spojiSeNaBazu();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	
	//prikaži formu za dodavanje slike
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		if (isset($_GET['id']))
		{
			$smarty->assign("id", $_GET['id']);
		}
		$tipKorisnika = $_SESSION['tip'];
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->display("addImageToGallery.tpl");
	}
	else {
			header("location: lurajcevi_02_login.php?err=401");
	}
	
?>