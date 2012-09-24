<?php
	include 'spajanje.php';
	include 'scripts/vrijeme.php';
	session_start();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	spojiSeNaBazu();
	
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if ($_SESSION['tip'] == 3)
		{
			$smarty->assign("admin", "admin");
			$smarty->assign("slika", $_SESSION['avatar'] );
			$smarty->assign("uspjeh", $_SESSION['sesija']);
			$smarty->assign("userName", $_SESSION['korisnik']);
			//$smarty->display('virtualTime.tpl');
		}
		else
		{
			header("location:lurajcevi_02.php");
		}
	}
	else {
			header("location:lurajcevi_02.php");
	}
	
	
	if (isset($_GET[vt]) == 1)
	{
		setTime();
		$time = getTime();
		$smarty->assign("gotTime", "Novo vrijeme dohvaćeno!");
	}
	
	$time = getTime();
	//iteriranje kroz dogadaje i promjena statusa ukoliko se promijenila
	$evStatus = mysql_query("SELECT * FROM dogadaj");
	while ($row = mysql_fetch_assoc($evStatus))
	{
		$eventId = $row['id_dogadaj'];
		$eventDate = $row['datum_dogadjaja'];
		$eventTime = $row['vrijeme_pocetka'];
		$event = strtotime($eventDate . $eventTime);
		if ($time > $event)
		{
			$change = mysql_query("UPDATE dogadaj SET status_dogadjaja = '0' WHERE id_dogadaj = '$eventId'") or die(mysql_error());
		}
		else
		{
			$change = mysql_query("UPDATE dogadaj SET status_dogadjaja = '1' WHERE id_dogadaj = '$eventId'");
		}
	}
	$smarty->assign("novoVrijeme", date("d.m.Y H:i:s",$time));
	$smarty->display("virtualTime.tpl");

?>