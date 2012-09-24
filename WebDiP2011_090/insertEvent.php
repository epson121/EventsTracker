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
else {
		header("location: lurajcevi_02_login.php?err=401");
}

if (isset($_POST['ok']))
{
	//dohvaćanje podataka iz forme
	$eventAuthor = $_POST['eventAuthor'];
	$eventCategoryName = $_POST['eventCategoryName'];
	$eventName = $_POST['eventName'];
	$eventDescription = $_POST['eventDescription'];
	$dan = $_POST['dan'];
	$mjesec = $_POST['mjesec'];
	$godina = $_POST['godina'];
	$vrijemePocetkaSat = $_POST['vrijemePocetkaSat'];
	$vrijemePocetkaMinuta = $_POST['vrijemePocetkaMinuta'];
	$cijena = $_POST['cijena'];
	$prijevoz_cijena = $_POST['prijevoz_cijena'];
	$nocenje_cijena = $_POST['nocenje_cijena'];
	$br_mjesta = $_POST['br_mjesta'];
	$mjesto = $_POST['mjesto'];
	
	//da bi ostalo zapisano u formi prilikom krivog unosa!
	$smarty->assign("userName", $_POST['eventAuthor']);
	$smarty->assign("eventCategoryName", $eventCategoryName);
	$smarty->assign("eventName", $eventName);
	$smarty->assign("eventDescription", $eventDescription);
	$smarty->assign("dan", $dan);
	$smarty->assign("mjesec", $mjesec);
	$smarty->assign("godina", $godina);
	$smarty->assign("vrijemePocetkaSat", $vrijemePocetkaSat);
	$smarty->assign("vrijemePocetkaMinuta", $vrijemePocetkaMinuta);
	$smarty->assign("cijena", $cijena);
	$smarty->assign("br_mjesta", $br_mjesta);
	$smarty->assign("mjesto", $mjesto);
	//popis kategorija za punjenje drop-down liste
	$sql = mysql_query("SELECT naziv_kategorije FROM kategorija");
		while($row = mysql_fetch_array($sql))
		{
			$kategorije[] = $row;
		}
		$smarty->assign('category', $kategorije);
	
	//$greske[];
	if (($eventCategoryName == "none") || empty($eventDescription) || empty($eventName) || empty($dan) || empty($mjesec)
		|| empty($godina) || empty($vrijemePocetkaMinuta) || empty($vrijemePocetkaSat) || empty($mjesto))
	{
		
		$greske['emptyField'] = "Polja ne smiju biti prazna!";
		$smarty->assign("emptyField", $greske['emptyField']);
		$smarty->assign("userName", $eventAuthor);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if ((preg_match("#[a-z]+#", $godina)) || (preg_match("#[A-Z]+#", $godina)) || (preg_match("#\W+#", $godina)))
	{
		$greske['errGodina'] = "Godina nije pravilno unešena!";
		$smarty->assign("emptyField", $greske['errGodina']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if ((preg_match("#[a-z]+#", $vrijemePocetkaSat)) || (preg_match("#[A-Z]+#", $vrijemePocetkaSat)) || (preg_match("#\W+#", $vrijemePocetkaSat))
				|| (preg_match("#[a-z]+#", $vrijemePocetkaMinuta)) || (preg_match("#[A-Z]+#", $vrijemePocetkaMinuta)) || (preg_match("#\W+#", $vrijemePocetkaMinuta)))
	{
		$greske['errVrijeme'] = "Vrijeme nije pravilno unešeno!";
		$smarty->assign("emptyField", $greske['errVrijeme']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if ((preg_match("#[a-z]+#", $cijena)) || (preg_match("#[A-Z]+#", $cijena)) || (preg_match("#\W+#", $cijena)))
	{
		$greske['errCijena'] = "Cijena nije pravilno unešena!";
		$smarty->assign("emptyField", $greske['errCijena']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if ((preg_match("#[a-z]+#", $prijevoz_cijena)) || (preg_match("#[A-Z]+#", $prijevoz_cijena)) || (preg_match("#\W+#", $prijevoz_cijena)))
	{
		$greske['errCijena'] = "Cijena nije pravilno unešena!";
		$smarty->assign("emptyField", $greske['errCijena']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if ((preg_match("#[a-z]+#", $nocenje_cijena)) || (preg_match("#[A-Z]+#", $nocenje_cijena)) || (preg_match("#\W+#", $nocenje_cijena)))
	{
		$greske['errCijena'] = "Cijena nije pravilno unešena!";
		$smarty->assign("emptyField", $greske['errCijena']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if ((preg_match("#[a-z]+#", $br_mjesta)) || (preg_match("#[A-Z]+#", $br_mjesta)) || (preg_match("#\W+#", $br_mjesta)))
	{
		$greske['errCijena'] = "Broj slobodniih mjesta nije pravilno unešena!";
		$smarty->assign("emptyField", $greske['errBrMjesta']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}
	else if($dan == "none" || $mjesec == "none")
	{
		$greske['errDatum'] = "Datum nije odabran!";
		$smarty->assign("emptyField", $greske['errDatum']);
		$smarty->display("lurajcevi_02_kreiranje_dogadaja.tpl");
	}

	
	if(empty($greske))
	{
		//get authors ID
		$sql1 = mysql_query("SELECT id_korisnika FROM korisnik WHERE username = '$eventAuthor'");
		$row1 = mysql_fetch_array($sql1);
		$id_korisnika = $row1[0];
		
		$sql2 = mysql_query("SELECT id_kategorija FROM kategorija WHERE naziv_kategorije = '$eventCategoryName'");
		$row2 = mysql_fetch_array($sql2);
		$id_kategorije = $row2[0];
		//formatiranje datuma
		$datum =  $_POST['godina'] . "-" . $_POST['mjesec']. "-" . $_POST['dan'];
	
		//formatiranje vremena
		$vrijeme = $vrijemePocetkaSat . ":" . $vrijemePocetkaMinuta;
		//usporedba je li vrijeme događaja prošlo
		//$tod = getTime();
		$today = date("Y-m-d H:i:s");
		//$today = date("d.m.Y H:i:s", $tod);
		$date = $datum . " " . $vrijeme . ":00";
		$to = strtotime($today);
		$exp = strtotime($date);
		
		
		if ($to > $exp)
		{
			$status = 0;
		}
		else
		{
			$status = 1;
		}

		
		
		mysql_query("INSERT INTO dogadaj(korisnik_id_korisnika, kategorija_id_kategorija, naziv_dogadaja, opis_dogadaja, datum_dogadjaja, vrijeme_pocetka, cijena_karte, mjesto, br_mjesta,prijevoz_cijena, nocenje_cijena, status_dogadjaja) VALUES ('$id_korisnika', '$id_kategorije', '$eventName', '$eventDescription', '$datum', '$vrijeme', '$cijena', '$mjesto', '$br_mjesta', '$prijevoz_cijena', '$nocenje_cijena', '$status')") or die(mysql_error());
				
		$smarty->assign("catSuccess", "Uspješno kreiran događaj.");
		$smarty->assign("admin", "admin");
		
		$log = "logger.txt";
		$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
		$time = getTime();
		$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " događaj '". $eventName . "' je dodan u bazu.\n";                        
		fwrite($fileHandler, $unos1);
		fclose($fileHandler);
		
		$smarty->display("lurajcevi_02_pregled_kategorija.tpl");
	}
	
}










?>





