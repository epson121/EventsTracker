<?php

	
	session_start();
	require_once('recaptchalib.php');
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$publicKey = "6LcZWdASAAAAAAr-MGEiys0nNAur_9BrEstPwuzB";
	$captcha = recaptcha_get_html($publicKey);
	$smarty = new Smarty();
	$smarty->assign("captcha", $captcha);
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION["admin"]))
		{
			$smarty->assign("admin", $_SESSION["admin"]);
		}
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		
		$smarty->display('lurajcevi_02_registration.tpl');
	}	
	else {
			$smarty->display('lurajcevi_02_registration.tpl');
	}
?>