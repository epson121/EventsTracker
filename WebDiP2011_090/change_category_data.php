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
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}

if (isset($_GET['id']))
	{
		$catId = $_GET['id'];
	}

if (isset($_POST['ok']))
{
	$naziv = $_POST['naziv_kategorije'];
	$opis = $_POST['opis_kategorije'];
	$mod = $_POST['mod'];
	
	
	if (empty($naziv))
	{
		$greske ['naziv'] = "Naziv nije unesen!";  
		$smarty -> assign("greske", $greske['naziv']);
	}
	if (empty($opis))
	{
		$greske ['opis'] = "Prezime nije uneseno!";
	
		$smarty -> assign("greske", $greske['prezime']);
	}
	//promjenit upis datuma, i izbrisat unos aktivacijskog koda i sl
	if(empty($greske))
		{
			mysql_query("UPDATE kategorija SET naziv_kategorije = '$naziv', kratak_opis='$opis', moderator = '$mod' WHERE id_kategorija = '$catId'") or die(mysql_error());
			$smarty->assign("imDone","Uspješna promjena!");
			mysql_query("UPDATE korisnik SET tip_korisnika_id_tipa_korisnika = 2 WHERE username = '$mod'") or die(mysql_error());
			//$smarty->assign('Opis', $opis);
			//$smarty->assign('Naziv', $naziv);
			$smarty->display("category_management.tpl");
		}
	else
		{
			$smarty->assign('Opis', $opis);
			$smarty->assign('Naziv', $naziv);
			$smarty->display("category_management.tpl");
		}
	
	
}

?>