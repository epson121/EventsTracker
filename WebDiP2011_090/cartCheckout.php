<?php
session_start();
include 'spajanje.php';

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
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		$user = $_SESSION['korisnik'];
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}

//id trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$user'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
while ($row = mysql_fetch_assoc($sql))
	{
		$user2 = $row['id_korisnika'];
	}

	//ako je postavljena kartica
if (isset($_SESSION['cart']))
{
	$cart = $_SESSION['cart']; 

		//iteriraj kroz polja u kartici - korisnike
	foreach ($cart as $i => $userId)
	{		//događaje
		foreach ($userId as $eventId => $event)
			{
			//dohvati podatke o događaju u kartici
			$cartItemData[] = $event; 
			$eventName = $event['ime_eventa'];
			//dohvati dodatne podatke iz baze
			$sql = mysql_query("SELECT * FROM dogadaj WHERE naziv_dogadaja = '$eventName'") or die(mysql_error());
			while($row = mysql_fetch_assoc($sql))
			{
				//izracunaj ukupnu cijenu
				$ukupno += $event['br_mjesta'] * $row['cijena_karte'];
				if ($event['prijevoz'] != "0")
					$ukupno += $event['br_mjesta'] * $row['prijevoz_cijena'];
				if ( $event['nocenje'] != "0")
					$ukupno += $event['br_mjesta'] * $row['nocenje_cijena'];
			}
			
			}
	}
	$smarty->assign("userList", $cartItemData);
	$smarty->assign("ukupno", $ukupno);
	$smarty->display("cartCheckout.tpl");
}
else
{
	$smarty->assign("noCart", "Niste dodali ništa u košaricu." );
	$smarty->display("cartCheckout.tpl");
}

?>