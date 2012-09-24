<?php
session_start();
include 'spajanje.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		$u = $_SESSION['korisnik'];
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		else
		{
			if (isset($_GET['id']))
			{
				$eventId = $_GET['id'];
			}
			//id trenutnog korisnika
			$sql = "SELECT * FROM korisnik WHERE username = '$u'";
			$sql = mysql_query($sql) or die ("Unable to fetch user data");
			while ($row = mysql_fetch_assoc($sql))
				{
					$user2 = $row['id_korisnika'];
				}
			$sql = mysql_query("SELECT * FROM onemogucen_pristup WHERE korisnik_id_korisnik = '$user2' AND dogadaj_id_dogadaj = '$eventId'") or die(mysql_error());
			if (mysql_num_rows($sql) > 0)
			{
				$smarty->assign("deniedAccess", "Pristup vam je onemogućen. Obratite se administratoru.");
				$smarty->assign("uspjeh", $_SESSION['sesija']);
				$smarty->assign("userName", $_SESSION['korisnik']);
				$smarty->assign("slika", $_SESSION['avatar']);
				$smarty->display("predlozak_tpl.tpl");
				exit;
			}
		}
		$tipKorisnika = $_SESSION['tip'];
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar']);
		$user = $_SESSION['korisnik'];
		$smarty->assign("cart", "cart");
	}
//prikaz košarice
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

if (isset($_GET['id']))
{
	$eventId = $_GET['id'];
}



$sql = "SELECT * FROM slika WHERE dogadaj_id_dogadaj = '$eventId'";
$sql = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_assoc($sql)) 
{
	$slika[] = $row;
}

if (!empty($slika))
{
	$smarty->assign("slika", $slika);
}

$sql3 = "SELECT * FROM korisnik WHERE username = '$user'";
$sql3 = mysql_query($sql3) or die(mysql_error());
$red3 = mysql_fetch_assoc($sql3);

$sql = mysql_query("SELECT * FROM dogadaj WHERE id_dogadaj = '$eventId'");

while ($row = mysql_fetch_assoc($sql))
{
		if ($row['korisnik_id_korisnika'] == $red3['id_korisnika'])
		{
			$smarty->assign("autor", "autor");
		}
		$event[] = $row;
}
$sql2 = mysql_query("SELECT COUNT(ocjena) AS count FROM ocijenjeni_dogadaji WHERE dogadaj_id_dogadaj = '$eventId'") or die(mysql_error());
$sql = mysql_query("SELECT SUM(ocjena) as suma FROM ocijenjeni_dogadaji WHERE dogadaj_id_dogadaj = '$eventId'");

$cou = mysql_fetch_assoc($sql2);
$sum = mysql_fetch_assoc($sql);

if ($cou['count'] > 0)
{
	$prosjek = round($sum['suma']/$cou['count'], 2);
}
else 
{
	$prosjek = "Još nema ocjene za ovaj događaj";
}



$smarty->assign("events", $event);
$smarty->assign("prosjek", $prosjek);
$smarty->assign("idEventa", $eventId);
$smarty->display("eventDetails.tpl");
?>














