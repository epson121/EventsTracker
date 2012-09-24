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


if (isset($_GET['id']))
	{
		$eventId = $_GET['id'];
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


//obrada forme
if (isset($_POST['ok']))
{

	$ccName = $_POST['userCreditCard'];
	$uAdress = $_POST['userAdress'];
	$ticketNo = $_POST['ticketNo'];
	$br_mjesta = $_POST['br_mjesta']; //onoliko koliko je slobodno
	if (isset($_POST[prijevoz_cijena]))
	{
		$pr = $_POST[prijevoz_cijena];
	}
	else
	{
		$pr = null;
	}
	if (isset($_POST[nocenje_cijena]))
	{
		$noc = $_POST[nocenje_cijena];
	}
	else
	{
		$noc = null;
	}
	$ostalo_mjesta = $br_mjesta - $ticketNo;
	
	if ($ccName == 'none')
	{
		$smarty->assign("purchaseError", "Niste odabrali karticu. Ukoliko nemate karticu dodajte ju na korisničkim stranicama.");
		$smarty->display("predlozak_tpl.tpl");
	}
	else if($uAdress == 'none')
	{
		$smarty->assign("purchaseError", "Niste odabrali adresu. Ukoliko nemate adresu dodajte ju na korisničkim stranicama.");
		$smarty->display("predlozak_tpl.tpl");
	}
	else if ($ticketNo == null)
	{
		$smarty->assign("purchaseError", "Niste unijeli broj karti.");
		$smarty->display("predlozak_tpl.tpl");
	}
	else if ($ostalo_mjesta < 0)
	{
		$smarty->assign("purchaseError", "Ne možete kupiti toliko karti.");
		$smarty->display("predlozak_tpl.tpl");
	}
	else if($vecKupljeno)
	{
		$ukupno = $vecKupljeno + $ticketNo; 
		if ($ticketNo <= $br_mjesta) //1000 <= 1
		{
		$br_mjesta = $br_mjesta - $ukupno;
		mysql_query("UPDATE kupljeni_dogadjaji SET broj_ulaznica = '$ukupno', prijevoz = '$pr', nocenje = '$noc', kartica = '$ccName', adresa = '$uAdress' WHERE korisnik_id_korisnika = '$user2' AND dogadaj_id_dogadaj = '$eventId'");
		mysql_query("UPDATE dogadaj SET br_mjesta = '$br_mjesta' WHERE id_dogadaj = '$eventId'");
		$smarty->assign("successPurchase", "Uspješno ste kupili karte. Hvala vam.  Dostava karata je besplatna.<br/> Pošto ste već kupili karte za ovaj događaj, pošiljka će vam doći na posljednju adresu te će naplata biti izvršena s posljednje odabrene kartice.");
		$smarty->display("predlozak_tpl.tpl");
		}
		else
		{
			$smarty->assign("purchaseError", "Ne možete kupiti toliko karti. Ali ste već uzeli nekoliko.");
			$smarty->display("predlozak_tpl.tpl");
		}
	}
	else
	{
	$insert = mysql_query("INSERT INTO kupljeni_dogadjaji(korisnik_id_korisnika, dogadaj_id_dogadaj, broj_ulaznica, prijevoz, nocenje, kartica, adresa) VALUES('$user2', '$eventId', '$ticketNo','$pr', '$noc', '$ccName', '$uAdress' )") or die(mysql_error());
	//update slobodnih mjesta
	$br_mj = $br_mjesta - $ticketNo;
	mysql_query("UPDATE dogadaj SET br_mjesta = '$br_mj' WHERE id_dogadaj = '$eventId'");
	$smarty->assign("successPurchase", "Uspješno ste kupili karte. Hvala vam.  Dostava karata je besplatna.");
	$smarty->display("predlozak_tpl.tpl");
	}
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>