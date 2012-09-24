<?php
session_start();
include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();
spojiSeNaBazu();

if (isset($_POST['ok']))
{
	$username = $_POST['username'];
}

if (empty($username))
{
	header("location:lurajcevi_02_login.php");
}
else
{
	$sql1 = mysql_query("SELECT * FROM korisnik WHERE username = '$username'");
	$num = "1234567890";
	$small = "abcdefghijkmnopqrstuvwxyz";
	$caps = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$sym = "!#$%&";
	$length = 2;
	$i = 0;
	$password = "";
	while ($i <= $length) {
		$password .= $small{mt_rand(0,strlen($small))};
		$i++;
	}
	$i = 0;
	while ($i <= $length) {
		$password .= $caps{mt_rand(0,strlen($caps))};
		$i++;
	}
	$i = 0;
	while ($i <= $length) {
		$password .= $num{mt_rand(0,strlen($num))};
		$i++;
	}
	$i = 0;
	while ($i <= $length) {
		$password .= $sym{mt_rand(0,strlen($sym))};
		$i++;
	}
	$sql = mysqL_query("UPDATE korisnik SET lozinka = '$password' WHERE username = '$username'");
	$sql2 = mysql_query("SELECT e_mail FROM korisnik WHERE username = '$username'");
	$row = mysql_fetch_assoc($sql2);
	$email = $row['e_mail'];
	$subject = "Nova lozinka za webdip!";
	$message = "Postovanje,  $ime!\nVasa nova lozinka je: '$password'";
	$headers = 'From: noreply@webdip_090.com' . 'X-Mailer: lurajcevi-webdip';
	mail($email, $subject, $message, $headers);
	
	//logger
	$log = "logger.txt";
	$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
	$time = getTime();
	$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '" . $username . "' je zatražio novu lozinku.\n";                        
	fwrite($fileHandler, $unos1);
	fclose($fileHandler);
	$smarty->assign("newPass", "Ukoliko ste unijeli dobro korisničko ime an mail adresu će vam stići nova lozinka.");
	$smarty->display("predlozak_tpl.tpl");
}

?>