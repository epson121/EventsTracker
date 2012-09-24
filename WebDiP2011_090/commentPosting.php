<?php
session_start();
include 'spajanje.php';
include 'scripts/vrijeme.php';
spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
{
	$user = $_SESSION['korisnik'];
}
if (isset($_GET['id']))
{
	$eventId = $_GET['id'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$txt = $_POST['txt'];
}
else
	{
		$comment = "Ovo je komentar";
	}

//trazenej id-a trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$user'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
$row = mysql_fetch_assoc($sql);
$user2 = $row['id_korisnika'];

//vrijeme virtualno
//$cr_date = getTime();
//$cr_d = date("d.m.Y H:i:s",$cr_date);
//$exp_act = date('Y-m-d H:i:s', strtotime($cr_d . ' +1 day'));
$cr_date = date("Y-m-d H:i:s");
$exp_act = date('Y-m-d H:i:s', strtotime($cr_date));

//unos komentara
$sql = "INSERT INTO komentar(dogadaj_id_dogadaj, korisnik_id_korisnik, tekst_komentara, vrijeme) VALUES('$eventId', '$user2', '$txt','$exp_act')";
$sql = mysql_query($sql) or die(mysql_error());                                                                
?>