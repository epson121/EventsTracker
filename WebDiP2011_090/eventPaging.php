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
			$sql = mysql_query("SELECT * FROM dogadaj");
			while ($row = mysql_fetch_assoc($sql))
			{
				$events[] = $row;
			}
		}
		else if (isset($_SESSION['moderator']))
		{
			//dohvati id kategorije kojoj je ovaj moderator
			$sql = mysql_query("SELECT * FROM kategorija WHERE moderator = '$username'");
			while($row = mysql_fetch_assoc($sql))
				{
					$catId[] = row;
					$cat = $row['id_kategorija'];
				//pokupi doga�aje kojima je id kategorije ovaj gore
				$sql = mysql_query("SELECT * FROM dogadaj WHERE kategorija_id_kategorija = '$cat'");
				while ($row = mysql_fetch_assoc($sql))
				{
					$events[] = $row;
				}
			}
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}



$smarty->assign("events", $events);
$smarty->display("eventPaging.tpl");
	
	
?>