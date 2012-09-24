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
	$eventName = $_POST['event'];
	
	$sql = mysql_query("DELETE FROM dogadaj WHERE naziv_dogadaja = '$eventName'") or die(mysql_error());
	
	$log = "logger.txt";
		$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
		$time = getTime();
		$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " događaj '". $eventName . "' je izbrisan.\n";                        
		fwrite($fileHandler, $unos1);
		fclose($fileHandler);
	
	$smarty->assign("successCC", "Uspješno ste obrisali događaj.");
	$smarty->display("predlozak_tpl.tpl");
}






?>