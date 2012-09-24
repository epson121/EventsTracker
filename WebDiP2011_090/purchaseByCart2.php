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

//provjera je li korisnik vec ranije kupio kartu za ovaj događaj
$sql2 = mysql_query("SELECT * FROM kupljeni_dogadjaji WHERE korisnik_id_korisnika = '$user2' AND dogadaj_id_dogadaj = '$eventId' ") or die(mysql_error());
$row = mysql_fetch_assoc($sql2);
$vecKupljeno = $row['broj_ulaznica'];

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
}
//obrada forme
if (isset($_POST['ok']))
{
	$ccName = $_POST['userCreditCard'];
	$uAdress = $_POST['userAdress'];
	//$br_mjesta = $_POST['br_mjesta'];
	
	if (empty($ccName))
	{
		header("location:cartCheckout.php?'$user'");
	}	
	if (empty($uAdress))
	{
		header("location:cartCheckout.php?'$user'");
	}
	foreach ($cartItemData as $event)
	{

		$eventName = $event['ime_eventa'];
		//dohvati eventId
		$sql = mysql_query("SELECT * FROM dogadaj WHERE naziv_dogadaja = '$eventName'") or die(mysql_error());
		$row = mysql_fetch_assoc($sql);
		$eventId = $row['id_dogadaj'];
		$br = $row['br_mjesta'];
		//provjera da li je već kupljen taj događaj
		$get = mysql_query("SELECT * FROM kupljeni_dogadjaji WHERE korisnik_id_korisnika = '$user2'") or die(mysql_error());
		while ($red = mysql_fetch_assoc($get))
			{
				if ($red['dogadaj_id_dogadaj'] == $eventId)
				{
					$vecUneseno = true;
					$oldTicketNo = $red['broj_ulaznica'];
					
				}
			}
		
		//bez obzira je li unesen novi događaj ili ne, mora se znat stanje prijevoza i noćenja
		if ($event['prijevoz'] != "0")
			{
				$pr = $event['prijevoz'];
			}
			else
			{
				$pr = "0";
			}
				if ($event['nocenje'] != "0")
			{
				$noc = $event['nocenje'];
			}
			else
			{
				$noc = "0";
			}
		$ticketNo = $event['br_mjesta'];
		if (!$vecUneseno)
		{
			$br_mj = $br - $ticketNo;
			
			//dodaj u kupljene događaje
			$insert = mysql_query("INSERT INTO kupljeni_dogadjaji(korisnik_id_korisnika, dogadaj_id_dogadaj, broj_ulaznica, prijevoz, nocenje, kartica, adresa) VALUES('$user2', '$eventId', '$ticketNo','$pr', '$noc', '$ccName', '$uAdress' )") or die(mysql_error());
			//smanji broj ulaznica u događaju
			mysql_query("UPDATE dogadaj SET br_mjesta = '$br_mj' WHERE id_dogadaj = '$eventId'");
		}
		else
		{
			$br_mj = $br - $ticketNo;
		
			//echo $br_mj . " ";
			//echo $br_mjesta . "b ";
			//echo $ticketNo;
			$ticketNo = $ticketNo + $oldTicketNo;
			mysql_query("UPDATE kupljeni_dogadjaji SET broj_ulaznica = '$ticketNo', prijevoz = '$pr', nocenje = '$noc', kartica = '$ccName', adresa = '$uAdress' WHERE korisnik_id_korisnika = '$user2' AND dogadaj_id_dogadaj = '$eventId'");	
			mysql_query("UPDATE dogadaj SET br_mjesta = '$br_mj' WHERE id_dogadaj = '$eventId'");
		}
	}
	$smarty->assign("successPurchase", "Uspješno ste kupili karte. Hvala vam.  Dostava karata je besplatna.");
	unset($_SESSION['cart']);
	$smarty->display("predlozak_tpl.tpl");
}

?>