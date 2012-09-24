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
		if (isset($_SESSION['admin']))
		{
			$smarty->assign("admin", $_SESSION['admin']);
		}
		$tipKorisnika = $_SESSION['tip'];
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
		$smarty->assign("slika", $_SESSION['avatar'] );
		$user = $_SESSION['korisnik'];
	}
	else {
			header("location: lurajcevi_02_login.php?err=401");
	}
$greske = array();

if (isset($_POST['ok']))
{
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$lozinka = $_POST['lozinka'];
	if (isset($_POST['tipKorisnika']))
		$tip = $_POST['tipKorisnika'];
	if (isset($_POST['statusKorisnika']))
		$status = $_POST['statusKorisnika'];
	
	if (empty($ime))
	{
		$greske ['ime'] = "Ime nije uneseno!";  
		$smarty -> assign("noName", $greske['ime']);
	}
	if (empty($prezime))
	{
		$greske ['prezime'] = "Prezime nije uneseno!";
	
		$smarty -> assign("noSurname", $greske['prezime']);
	}
	if (empty($email))
	{
		$greske ['email'] = "Email adresa nije unesena!"; 
		$smarty -> assign("noEmail", $greske['email']);
	}
	if (empty($lozinka))
	{
		$greske ['lozinka'] = "Lozinka nije unesena!"; 
		$smarty -> assign("noEmail", $greske['email']);
	}
	
	if($_FILES['avatar']['size'] > 0)
	{
		$fileName = $_FILES['avatar']['name'];
		$tmpName = $_FILES['avatar']['tmp_name'];
		$fileSize = $_FILES['avatar']['size'];
		$fileType = $_FILES['avatar']['type'];
		
		$ext = end(explode('.', $fileName));
		if (($ext != 'gif') && ($ext != 'jpg') && ($ext != 'png') )
		{
				$greske['tip_slike'] = "Tip slike nije podržan. ".$ext;
				$smarty -> assign ("badAvatarType", $greske['tip_slike']);
		}
		else
		{
			$dir = "uploads/avatars/$username/";
			if (!is_dir($dir))
			{
				 mkdir("uploads/avatars/$username/", 0777);
			}
			$filePath = $dir . $fileName ;
			$uploadPic = move_uploaded_file($tmpName, $filePath);
			if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes($fileName);
				$filePath = addslashes($filePath);
			}
		}
	}
	//promjenit upis datuma, i izbrisat unos aktivacijskog koda i sl
	if(empty($greske))
		{
			if ($status == 2)
			{
				$log = "logger.txt";
				$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
				$time = getTime();
				$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '" . $ime . " " . $prezime . "' , korisničko ime = '" . $username . "' ja zaključan.\n";                        
				fwrite($fileHandler, $unos1);
				fclose($fileHandler);
			}
			else
			{
				$log = "logger.txt";
				$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
				$time = getTime();
				$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '" . $ime . " " . $prezime . "' , korisničko ime = '" . $username . "' ja promijenio podatke.\n";                        
				fwrite($fileHandler, $unos1);
				fclose($fileHandler);
			}
			if(isset($filePath)) 
			{
				mysql_query("UPDATE korisnik SET tip_korisnika_id_tipa_korisnika = '$tip', Ime='$ime', prezime = '$prezime', lozinka = '$lozinka', e_mail = '$email', status_korisnika = '$status',status_korisnika = '$status', avatar = '$filePath', aktivacijski_kod = 'NULL' WHERE username = '$username'");
			}
			else  
			{
				mysql_query("UPDATE korisnik SET tip_korisnika_id_tipa_korisnika = '$tip', Ime='$ime', prezime = '$prezime', e_mail = '$email', lozinka = '$lozinka', status_korisnika = '$status', status_korisnika = '$status', aktivacijski_kod = 'NULL' WHERE username = '$username'");
			}
			$uspjeh ['spremljeno'] = "Uspješno spremljeni podaci u bazu.";
			$smarty -> assign("updateSuccessful", $uspjeh['spremljeno']);
			
			
			
			$smarty->display("predlozak_tpl.tpl");
			
		}
	else
		{
			
			$smarty->display("lurajcevi_02_registration.tpl");
		
		}
	
	
}
?>