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

$z = "<form id = 'deleteUser' method = 'post' action = 'deleteUser2.php'><br/>Brište korisnika:<br/>";
$z .= $y . "<br/>";
$z .= "<input type = 'submit' name = 'ok' value = 'Obriši'/></form>";
echo $z;
?>