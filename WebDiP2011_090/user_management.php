<?php

session_start();
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();	

spojiSeNaBazu();

if(isset($_GET['user']) && $_GET['user'] == $_SESSION['korisnik'])
{
	$attemptOk  = true;
}	

if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (($_SESSION['tip'] == 3))
		{
			$smarty->assign("uspjeh", $_SESSION['sesija']);
			$smarty->assign("admin", $_SESSION['admin']);
			$smarty->assign("slika", $_SESSION['avatar'] );
			$smarty->assign("userName", $_SESSION['korisnik']);
		}
		else if ($_SESSION['tip'] == 2)
		{
			$smarty->assign("nonAdmin", "Value");
			$smarty->assign("uspjeh", $_SESSION['sesija']);
			$smarty->assign("mod", $_SESSION['moderator']);
			$smarty->assign("slika", $_SESSION['avatar'] );
			$smarty->assign("userName", $_SESSION['korisnik']);
		}
		else if( $attemptOk == true)
		{
			$smarty->assign("nonAdmin", "Value");
			$smarty->assign("uspjeh", $_SESSION['sesija']);
			$smarty->assign("slika", $_SESSION['avatar'] );
			$smarty->assign("userName", $_SESSION['korisnik']);
		}
		else
		{
			//pocetak za zapis u datoteku virtualnog vremena i slicno ->neautorizirani korisnik mijenja podatke !!!
			$log = "logger.txt";
			$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
			$korisnik = $_SESSION['korisnik'];
			$upit = mysql_query("SELECT username, Ime, prezime, id_korisnika FROM korisnik WHERE username = '$korisnik'");
			$row = mysql_fetch_assoc($upit);
			$time = getTime();
			$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '". $row['username'] . "'  -> podaci: (ime) " . $row['Ime'] . " (prezime) " . $row['prezime'] . " (id) " . $row['id_korisnika'] . ", je pokušao mijenjati podatke na stranici: " . $_SERVER['REQUEST_URI'] . "\n";                        
			
			fwrite($fileHandler, $unos1);
			fclose($fileHandler);
			header("location:lurajcevi_02.php");	
		}
	}
	else
    {
		
		header("location:lurajcevi_02.php");
	}

	



if(isset($_GET['user']))
{
	$currentUser = $_GET['user'];
	unset($_GET['user']);
}
else 
{
	header("location:usersPaging.php");
}


$sql = "SELECT * FROM korisnik WHERE username = '$currentUser'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
$row = mysql_fetch_assoc($sql);

$smarty->assign("Username", $row['username']);
$smarty->assign("Ime", $row['Ime']);
$smarty->assign("Prezime", $row['prezime']);
$smarty->assign("lozinka", $row['lozinka']);
$smarty->assign("tipKorisnika", $row['tip_korisnika_id_tipa_korisnika']);
$smarty->assign("Email", $row['e_mail']);
$smarty->assign("Avatar", $row['avatar']);
$smarty->assign("statusKorisnika", $row['status_korisnika']);


$smarty->display("user_management.tpl")
?>











