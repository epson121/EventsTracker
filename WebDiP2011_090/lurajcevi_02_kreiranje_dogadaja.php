<?php
	include 'spajanje.php';
	session_start();
	spojiSeNaBazu();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	if(isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		$username = $_SESSION['korisnik'];
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
			$sql = mysql_query("SELECT naziv_kategorije FROM kategorija");
			while($row = mysql_fetch_array($sql))
				{
					$kategorije[] = $row;
				}
			$smarty->assign('category', $kategorije);
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
			$sql = mysql_query("SELECT naziv_kategorije FROM kategorija WHERE moderator = '$username'");
			while($row = mysql_fetch_array($sql))
				{
					$kategorije[] = $row;
				}
			$smarty->assign('category', $kategorije);
		}
		
		
		$smarty->assign('eventCategoryName', "Odaberi kategoriju");
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->display('lurajcevi_02_kreiranje_dogadaja.tpl');
	}
	else {
			
			$smarty->display('lurajcevi_02_login.tpl');
	}
?>