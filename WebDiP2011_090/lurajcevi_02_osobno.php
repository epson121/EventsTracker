<?php

	session_start();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION["admin"]))
		{
			$smarty->assign("admin", $_SESSION["admin"]);
		}
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->display('lurajcevi_02_osobno.tpl');
	}
	else {
			$smarty->display('lurajcevi_02_osobno.tpl');
	}
?>