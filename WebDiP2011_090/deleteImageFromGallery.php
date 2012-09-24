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
		$uname = $_SESSION['korisnik'];
		
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
			$admin = true;
		}
		if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", "mod");
		}
		$user = $_SESSION['korisnik'];
	}

if (isset($_GET['id']))
{
	$imageId = $_GET['id'];
	$eid = $_GET['eid'];
}

$sql = mysql_query("DELETE FROM slika WHERE id_slike = '$imageId'");
header("location:eventDetails.php?id=$eid");
?>