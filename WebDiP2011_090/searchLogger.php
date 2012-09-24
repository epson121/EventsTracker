<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		$tipKorisnika = $_SESSION['tip'];
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar'] );
		$user = $_SESSION['korisnik'];
	}
	else {
			header("location: lurajcevi_02_login.php?err=401");
	}
	
if (isset($_POST['ok']))
{
	$filter = $_POST['filter'];
	if ($filter == "" )
	{
		$smarty->assign("filter", $filter);
		$smarty->assign("noFilter", "Niste popunili sva polja!");
		$smarty->display('searchLogger.tpl');
		return;
	}
	else
	{
		$file = file("logger.txt");
		foreach ($file as $line) 
		{
			if (substr_count($line, $filter))
				$x .= $line . "<br/>";
			$smarty->assign("x", $x);
		}
	}
		
	$smarty->assign("userList", $events);
	$smarty->assign("filter", "filter");
	$smarty->display('searchLogger.tpl');
}
else
{
	$smarty->display('searchLogger.tpl');
}
?>