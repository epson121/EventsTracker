<?php

session_start();
include 'spajanje.php';

spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_SESSION['sesija']) && isset($_SESSION['korisnik']))
	{
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		$tipKorisnika = $_SESSION['tip'];
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar'] );
	}
	else {
			header("location: lurajcevi_02_login.php?err=401");
	}

if ( $tipKorisnika == 3 )
{
	$smarty->assign("uredi", "Uredi korisnika");
}

#Provjera broja zapisa u bazi
$query = " SELECT * FROM kategorija";
$result = mysql_query($query) or die(mysql_error());
$num = mysql_num_rows($result);


#Broj zapisa po stranici
$rowsPerPage = 10;

$totalPages = ceil($num/$rowsPerPage);

#

if(isset($_GET['currentpage']) && is_numeric($_GET['currentpage'] ))
{
	$currentpage = (int) $_GET['currentpage'];
}
else {
	$currentpage = 1;
}
#ako je veća od posljednje
if ($currentpage > $totalPages)
{
	$currentpage = $totalPages;
}
#ako je manja od prve
if ($currentpage < 1)
{
	$currentpage = 1;
}

#offset
$offset = ($currentpage - 1)*$rowsPerPage;
 
$sql = mysql_query("SELECT * FROM kategorija LIMIT $offset, $rowsPerPage") or die (mysql_error());
$nrow = mysql_num_rows($sql);
while($row = mysql_fetch_assoc($sql)) 
{
	$category[] = $row;
}


for ($i = 0; $i < $nrow; $i++)
{
	$sql1 = mysql_query("SELECT username FROM korisnik WHERE id_korisnika = '".$category[0]['korisnik_id_korisnika']."'");
	$sql1 = mysql_fetch_array($sql1);
	$author[] = $sql1;
}
$smarty->assign("userList", $category);
$smarty->assign("authorList", $author);
$range = 1;


if ($currentpage > 1)
{
	$first = "<a href = '{$_SERVER['PHP_SELF']}?currentpage=1'><<</a>";
	$smarty->assign("prva", $first);
}
else {
	$smarty->assign("prvaLabel", "<<");
}

$prevNum = $currentpage - 1;
if ($prevNum >= 1)
{
	$prev = "<a href = '{$_SERVER['PHP_SELF']}?currentpage=$prevNum'>$prevNum</a>";
	$smarty->assign("prev", $prev);
	
}
$nextNum = $currentpage + 1;
if ($nextNum <= $totalPages)
{
	$next = "<a href = '{$_SERVER['PHP_SELF']}?currentpage=$nextNum'>$nextNum</a>";
	$smarty->assign("next", $next);
}

$currNum = $currentpage;
$smarty->assign("trenutna", $currNum);


if ($currentpage < $totalPages)
{
	$last = "<a href = '{$_SERVER['PHP_SELF']}?currentpage=$totalPages'>>></a>";
	$smarty->assign("posljednja", $last);
}
else{
	$smarty->assign("posljednjaLabel", ">>");
}


$smarty->display("categoriesPaging.tpl");












?>