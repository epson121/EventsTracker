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
		$username = $_SESSION['korisnik'];
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}
	
if (isset($_POST['ok']))
{
	$ccName = $_POST['ccName'];
	$ccNum = $_POST['ccNum'];
	$idCc = $_POST['idCc'];
	$idUser = $_POST['idUser'];
	$ch = mysql_query("UPDATE korisnik_kartica SET kreditna_kartica = '$ccName', broj_kartice = '$ccNum' WHERE id_kartica= '$idCc'") or die(mysql_error());
}
	
//id trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$username'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
while ($row = mysql_fetch_assoc($sql))
	{
		$user2 = $row['id_korisnika'];
		$sql2 = mysql_query("SELECT * FROM korisnik_kartica WHERE korisnik_id_korisnika = '$user2'");
		while ($row2 = mysql_fetch_assoc($sql2))
		{
			$cc[] = $row2;
		}
	}
$smarty->assign("action", $_SERVER['PHP_SELF']);
$smarty->assign("users", $cc);
$smarty->display("ccPaging.tpl");
	
	
?>