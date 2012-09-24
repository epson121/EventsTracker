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
	$criteria = $_POST['criteria'];
	if ($filter == "" || $criteria == "none")
	{
		$smarty->assign("filter", $filter);
		$smarty->assign("noFilter", "Niste popunili sva polja!");
		$smarty->display('events.tpl');
		return;
	}
	
	if ($criteria == 1) //Autor
	{
		//dohvati id korisnika
		$get = mysql_query("SELECT id_korisnika, username FROM korisnik WHERE username = '$filter'") or die(myaql_error());
		while ($row = mysql_fetch_assoc($get)) //iteriraj kroz rezultat i vadi sve događaje kojima je taj korisnik autor
		{
			$username = $row['username'];
			$id = $row['id_korisnika'];
			$sql = mysql_query("SELECT * FROM dogadaj WHERE korisnik_id_korisnika = '$id'");
			while ($row2 = mysql_fetch_assoc($sql))
			{
				$events[] = $row2;	
			}
		}
		$smarty->assign("userList", $events);
		$smarty->assign("autor", "autor");
		$smarty->assign("filter", "filter");
		$smarty->display('events.tpl');
		return;
	}
	else if ($criteria == 2) //Naziv događaja
	{
		$sql = mysql_query("SELECT * FROM dogadaj WHERE naziv_dogadaja = '$filter'");
		while ($row2 = mysql_fetch_assoc($sql))
		{
			$id = $row2['korisnik_id_korisnika'];
			$events[] = $row2;
		}
		$smarty->assign("userList", $events);
		$smarty->assign("filter", "filter");
		$smarty->display('events.tpl');
		return;
	}
	else if ($criteria == 3) //Cijena
	{
		$sql = mysql_query("SELECT * FROM dogadaj WHERE cijena_karte = '$filter'");
		while ($row2 = mysql_fetch_assoc($sql))
		{
			$id = $row2['korisnik_id_korisnika'];
			$events[] = $row2;
		}
		$smarty->assign("userList", $events);
		$smarty->assign("filter", "filter");
		$smarty->display('events.tpl');
		return;
	}
	else if ($criteria == 4) //Status
	{
		$sql = mysql_query("SELECT * FROM dogadaj WHERE status_dogadjaja = '$filter'");
		while ($row2 = mysql_fetch_assoc($sql))
		{
			$id = $row2['korisnik_id_korisnika'];
			$events[] = $row2;
		}
		$smarty->assign("userList", $events);
		$smarty->assign("filter", "filter");
		$smarty->display('events.tpl');
		return;
	}
	else if ($criteria == 5) //Mjesto
	{
		$sql = mysql_query("SELECT * FROM dogadaj WHERE mjesto = '$filter'");
		while ($row2 = mysql_fetch_assoc($sql))
		{
			$id = $row2['korisnik_id_korisnika'];
			$events[] = $row2;
		}
		$smarty->assign("userList", $events);
		$smarty->assign("filter", "filter");
		$smarty->display('events.tpl');
		return;
	}
	
	
	
	
	

	
	$smarty->assign("userList", $events);
	$smarty->assign("filter", "filter");
	$smarty->display('events.tpl');
}
?>