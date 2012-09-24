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



$y = "<select name = 'username' id = 'username'>";
$y .= "<option value = 'none' >Odaberite korisnika </option>";
if (!$admin)
{
	$use = mysql_query("SELECT * FROM korisnik WHERE tip_korisnika_id_tipa_korisnika = '1'") or die (mysql_error());
}
else
{
	$use = mysql_query("SELECT * FROM korisnik WHERE tip_korisnika_id_tipa_korisnika != '3'") or die (mysql_error());
}
while ($row = mysql_fetch_assoc($use))
{
	$u = $row['username'];
	$y .= "<option value = '$u'>$u</option>";
}
$y .= "</select><br/>";



$x = "<select name = 'event' id = 'event'>";
$x .= "<option value = 'none' >Odaberite dogadaj </option>";
if (!$admin)
{
	$sql = mysql_query("SELECT * FROM kategorija WHERE moderator = '$uname'");
}
else
{
	$sql = mysql_query("SELECT * FROM kategorija");
}
while ($row3 = mysql_fetch_assoc($sql))
{
	$cat = $row3['id_kategorija'];
	$event = mysql_query("SELECT * FROM dogadaj WHERE kategorija_id_kategorija = '$cat'") or die (mysql_error());
	while ($row2 = mysql_fetch_assoc($event))
	{
		$e = $row2['naziv_dogadaja'];
		$x .= "<option value = '$e'>$e</option>";
	}
}
$x .= "</select><br/>";

$z = "<form id = 'markUser' method = 'post' action = 'disableUser2.php'><br/>Onemogućavate pristup korisniku:<br/>";
$z .= $y . "<br/>";
$z .= $x . "<br/>";
$z .= "Razlog:<br/><textarea name = 'markReason' rows = '3' cols = '22'></textarea><br/>";
$z .= "<input type = 'submit' name = 'ok' value = 'Označi'/></form>";
echo $z;
?>