<?php
	
	session_start();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	if (isset($_GET['err']) && $_GET['err'] == 401)
		{
		 $smarty->assign("nonAuthAccess", "Kako bi nastavili morate se prijaviti!");
		}
	if (isset($_COOKIE['user']));
	{
			$smarty->assign("cookiedUser", $_COOKIE['user']);
	}
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION["admin"]))
		{
			$smarty->assign("admin", $_SESSION["admin"]);
		}
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->display('usersPaging.tpl');
	}
	else {
			$smarty->assign("neautorizirano", "Za pristup toj stranici se morate registritati!");
			$smarty->display('lurajcevi_02.tpl');
	}
?>