<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		$u = $_SESSION['korisnik'];
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
				
			if (isset($_GET['id']))
			{
				$eventId = $_GET['id'];
			}			
				
			$sql = mysql_query("SELECT * FROM slika WHERE dogadaj_id_dogadaj = '$eventId'") or die(mysql_error());
			while($row = mysql_fetch_assoc($sql))
			{
				$image[] = $row;
			}
		$smarty->assign("image", $image);
		$smarty->assign("uspjeh", "uspjeh");
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar']);
		$smarty->display("editImageGallery.tpl");
	}
	
?>