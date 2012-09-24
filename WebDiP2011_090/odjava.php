<?php

	session_start();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		session_unset();
		header("location:lurajcevi_02.php")	;
	}
	else {
			$smarty->display('lurajcevi_02_login.tpl');
	}
?>
