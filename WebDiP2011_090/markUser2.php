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
	$user = $_POST['username'];
	$event = $_POST['event'];
	$markReason = $_POST['markReason'];
}

if (empty($user))
{
	header("location:lurajcevi_02_admin_panel.php");
}
if (empty($event))
{
	header("location:lurajcevi_02_admin_panel.php");
}
else
{
	$evId = mysql_query("SELECT * FROM dogadaj WHERE naziv_dogadaja = '$event'");
	$red2 = mysql_fetch_assoc($evId);
	$eventId = $red2['id_dogadaj'];
	$sql1 = mysql_query("SELECT * FROM korisnik WHERE username = '$user'");
	while ($red = mysql_fetch_assoc($sql1))
	{	
		$idKor = $red['id_korisnika'];
		$sql = mysql_query("INSERT INTO oznacavanje(korisnik_id_korisnik,username, dogadaj_id_dogadaj, moderator, razlog_oznacavanja) VALUES('$idKor', '$user',  '$eventId', '$mod', '$markReason')") or die(mysql_error());
	}
	$smarty->assign("successCC", "Uspješno ste označili korisnika. Naši administratori će razmotriti vašu poruku.");
	$smarty->display("predlozak_tpl.tpl");
}






?>