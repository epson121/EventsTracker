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
		else if (isset($_SESSION['moderator']))
		{
			$smarty->assign("mod", $_SESSION['moderator']);
		}
		
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}
else {
		header("location: lurajcevi_02_login.php?err=401");
}

if (isset($_GET['id']))
{
	$eventId = $_GET['id'];
}
	
	
$sql = mysql_query("SELECT * FROM dogadaj where id_dogadaj = '$eventId'") or die("mysql_error()");
while ($row = mysql_fetch_assoc($sql))
{
	$events[] = $row;
	$uid = $row['korisnik_id_korisnika'];
	$cid = $row['kategorija_id_kategorija'];
	$date = $row['datum_dogadjaja'];
	$time = $row['vrijeme_pocetka'];
}

//split datuma 2012-10-03
list($year, $month, $day) = explode('-', $date);

switch($month)
{
	case "01":
		$month = "Siječanj";
		$n = "01";
		break;
	case "02":
		$month = "Veljača";
		$n = "02";
		break;
	case "03":
		$month = "Ožujak";
		$n = "03";
		break;
	case "04":
		$month = "Travanj";
		$n = "04";
		break;
	case "05":
		$month = "Svibanj";
		$n = "05";
		break;
	case "06":
		$month = "Lipanj";
		$n = "06";
		break;
	case "07":
		$month = "Srpanj";
		$n = "07";
		break;
	case "08":
		$month = "Kolovoz";
		$n = "08";
		break;
	case "09":
		$month = "Rujan";
		$n = "09";
		break;
	case "10":
		$month = "Listopad";
		$n = "10";
		break;
	case "11":
		$month = "Studeni";
		$n = "11";
		break;
	case "12":
		$month = "Prosinac";
		$n = "12";
		break;
}


//split vremena
list($hour, $minute) = explode(':', $time);


//dohvaćanje imena autora
$sql2 = mysql_query("SELECT username FROM korisnik WHERE id_korisnika = '$uid'") or die("mysql_error()");
$row2 = mysql_fetch_assoc($sql2);
$username = $row2['username'];

//dohvaćje naziva kategorije
$sql3 = mysql_query("SELECT naziv_kategorije FROM kategorija WHERE id_kategorija = '$cid' ") or die("mysql_error()");
$row3 = mysql_fetch_assoc($sql3);
$categoryName = $row3['naziv_kategorije']; 

//dohvaćje svhi kategorija
$sql4 = mysql_query("SELECT * FROM kategorija") or die("mysql_error()");
while($row4 = mysql_fetch_assoc($sql4))
{
	$cat[] = $row4; 
}

$smarty->assign("year",$year);
$smarty->assign("month", $month);
$smarty->assign("n", $n);
$smarty->assign("day", $day);
$smarty->assign("hour", $hour);
$smarty->assign("minute", $minute);
$smarty->assign("username", $username);
$smarty->assign("categoryName", $categoryName);
$smarty->assign("cat", $cat);
$smarty->assign("events", $events);
$smarty->display("eventManagement.tpl");
	
	
?>