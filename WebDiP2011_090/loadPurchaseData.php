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
	}


$user = $_SESSION['korisnik'];

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


//dohvatiti brojeve kartica
$x = "<select name = 'userCreditCard' id = 'userCreditCard'>";
$x .= "<option value = 'none' >Odaberite karticu </option>";
$kartica = mysql_query("SELECT * FROM korisnik_kartica WHERE korisnik_id_korisnika ='$user2' ") or die (mysql_error());
while($row = mysql_fetch_assoc($kartica))
{
	$cc = $row['kreditna_kartica'];
	$x .= "<option value = '$cc' >$cc</option>";
}
$x .= "</select><br/>";
	
//dohvatiti adrese
$y = "<select name = 'userAdress' id = 'userAdress'>";
$y .= "<option value = 'none' >Odaberite adresu </option>";
$adresa = mysql_query("SELECT * FROM korisnik_adresa WHERE korisnik_id_korisnika ='$user2' ") or die (mysql_error());
while($row = mysql_fetch_assoc($adresa))
{
	$ad = $row['adresa'];
	$y .= "<option value = '$ad'>$ad</option>";
}
$y .= "</select><br/>";


//odabir podataka o događaju koji se kupuje
$sql = mysql_query("SELECT * FROM dogadaj WHERE id_dogadaj = '$eventId'") or die(mysql_error());
while ($row = mysql_fetch_assoc($sql))
{

	$ret = $row['naziv_dogadaja'];
	$ret2 = $row['cijena_karte'];
	$ret3 = $row['br_mjesta'];
	//echo $ret;
	if ($row['prijevoz_cijena'] != null)
	{
		$ret4 = "<input type='checkbox' name='prijevoz_cijena' value='1'/> Uključi cijenu prijevoza! <br/>";
	}
	if ($row['nocenje_cijena'] != null)
	{
		$ret5 = "<input type='checkbox' name='nocenje_cijena' value='1'/> Uključi cijenu noćenja! <br/>";
	}	
}
$z .= "<span>Kupujete kartu za <br/> <span class = 'purchaseDialogData'> '$ret' </span><br/>";
$z .= "Cijena karte je <span class = 'purchaseDialogData'> $ret2 </span><br/>";
$z .= "<span>Karata preostalo: <span class = 'purchaseDialogData'> $ret3</span></span><br/>";
$z .= "<span>Broj karata: </span><br/>";
$z .= "<form method= 'post' name = 'purchaseEventTickets' id = 'purchaseEventTickets' action = 'purchaseEventTickets.php?id=$eventId'>";
$z .= "<input type= 'hidden' name = 'br_mjesta' value = '$ret3'/>";
$z .= "<input type = 'text' name = 'ticketNo' id = 'ticketNo'/><br/>";
$z .= $ret4;
$z .= $ret5;
$z .= $x;
$z .= $y;
$z .= "<input type= 'submit' id='submitPurchaseButton' name = 'ok' value = 'Kupi'></form>";

echo $z;

?>