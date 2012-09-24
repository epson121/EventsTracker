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



$y = "<select name = 'catName' id = 'Catname'>";
$y .= "<option value = 'none' >Odaberite kategoriju </option>";
$use = mysql_query("SELECT naziv_kategorije FROM kategorija") or die (mysql_error());
while ($row = mysql_fetch_assoc($use))
{
	$u = $row['naziv_kategorije'];
	$y .= "<option value = '$u'>$u</option>";
}
$y .= "</select><br/>";

$z = "<form id = 'deleteCategory' method = 'post' action = 'deleteCategory2.php'><br/>Brišete kategoriju:<br/>";
$z .= $y . "<br/>";
$z .= "<input type = 'submit' name = 'ok' value = 'Obriši'/></form>";
echo $z;
?>