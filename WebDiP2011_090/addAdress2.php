<?php
session_start();
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();
spojiSeNaBazu();

//ako je ulogiran
if(isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}

//ako je postavljeno ime korisnika
if (isset($_GET['uname']))
{
	$user = $_GET['uname'];
}
//ako je poslan post zahtjev
if (isset($_POST['ok']))
{
	$adressName = $_POST['adressName'];
	
}

//ako je prazno ime adrese
if (empty($adressName))
{
	header("location:user_management.php?'$user'");
}
else
{
	//unesi novu adresu u bazu
	$sql1 = mysql_query("SELECT * FROM korisnik WHERE username = '$user'");
	while ($red = mysql_fetch_assoc($sql1))
	{	
		$idKor = $red['id_korisnika'];
		$sql = mysql_query("INSERT INTO korisnik_adresa(korisnik_id_korisnika, adresa) VALUES('$idKor', '$adressName')") or die(mysql_error());
	}
	$smarty->assign("successCC", "Uspješno ste dodali adresu.");
	$smarty->display("predlozak_tpl.tpl");
}






?>