<?php
	session_start();
	include 'spajanje.php';
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	spojiSeNaBazu();
	if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION["admin"]))
		{
			$smarty->assign("admin", $_SESSION["admin"]);
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("cart", "cart");
		if (isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart']; 

			foreach ($cart as $i => $userId)
			{
				foreach ($userId as $eventId => $event)
					{
					$cartItemData[] = $event; 
					$eventName = $event['ime_eventa'];
					$sql = mysql_query("SELECT * FROM dogadaj WHERE naziv_dogadaja = '$eventName'") or die(mysql_error());
					while($row = mysql_fetch_assoc($sql))
					{
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
		}
    

		$smarty->display('lurajcevi_02.tpl');
	}
	else {
			$smarty->display('lurajcevi_02.tpl');
	}
?>