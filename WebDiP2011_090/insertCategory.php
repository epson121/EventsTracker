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
		$smarty->assign("uspjeh", "mod");
	}


if (isset($_POST['ok']))
{
	$categoryAuthor = $_POST['categoryAuthor'];
	$categoryName = $_POST['categoryName'];
	$categoryDescription = $_POST['categoryDescription'];

	//$greske[];
	if (empty($categoryName) || empty($categoryDescription))
	{
		$greske['emptyField'] = "Polja ne smiju biti prazna!";
		$smarty->assign("emptyField", $greske['emptyField']);
		$smarty->assign("userName", $categoryAuthor);
		$smarty->display("lurajcevi_02_kreiranje_kategorije.tpl");
	}

	
	if(empty($greske))
	{
		//get authors ID
		$sql1 = mysql_query("SELECT id_korisnika FROM korisnik WHERE username = '$categoryAuthor'");
		$row = mysql_fetch_array($sql1);
		//
		//insert files to categories table
		
		mysql_query("INSERT INTO kategorija (korisnik_id_korisnika, naziv_kategorije, kratak_opis) VALUES('$row[0]', '$categoryName', '$categoryDescription')") or die(mysql_error());
		$smarty->assign("catSuccess", "Uspješno kreirana kategorija.");
		$smarty->assign("admin", "admin");
		
		$log = "logger.txt";
		$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
		$time = getTime();
		$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " kategorija '". $categoryName . "' je dodana u bazu.\n";                        
		fwrite($fileHandler, $unos1);
		fclose($fileHandler);
		
		$smarty->display("lurajcevi_02_pregled_kategorija.tpl");
	}
	
}










?>





