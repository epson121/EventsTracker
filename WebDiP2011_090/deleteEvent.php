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

$x = "<select name = 'event' id = 'event'>";
$x .= "<option value = 'none' >Odaberite dogadaj </option>";
$sql = mysql_query("SELECT * FROM dogadaj") or die (mysql_error());
while($row = mysql_fetch_assoc($sql))
{
	$u = $row['naziv_dogadaja'];
	$x .= "<option value = '$u'>$u</option>";
}
$x .= "</select><br/>";

$z = "<form id = 'deleteCategory' method = 'post' action = 'deleteEvent2.php'><br/>Brišete događaj:<br/>";
$z .= $x . "<br/>";
$z .= "<input type = 'submit' name = 'ok' value = 'Obriši'/></form>";
echo $z;
?>