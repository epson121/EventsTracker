<?php
session_start();
	include 'spajanje.php';
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	spojiSeNaBazu();
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION["admin"]))
		{
			$smarty->assign("admin", $_SESSION["admin"]);
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->display('lurajcevi_02_dokumentacija_sequence.tpl');
	}
	else {
			$smarty->display('lurajcevi_02.tpl');
	}
	
?>