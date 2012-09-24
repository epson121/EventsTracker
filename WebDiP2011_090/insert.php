<?php

include 'spajanje.php';
include 'scripts/xmlCreator.php';
//include 'scripts/scale.php';
include 'scripts/vrijeme.php';
spojiSeNaBazu();

require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();
$greske = array();

require_once('recaptchalib.php');
$privatekey = "6LcZWdASAAAAAEXHXe8ZAMPDOQURPiJ_twxHjxiq";
$publicKey = "6LcZWdASAAAAAAr-MGEiys0nNAur_9BrEstPwuzB";
$captcha = recaptcha_get_html($publicKey);
$smarty->assign("captcha", $captcha);
//if (isset($_POST['ok']))
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	
	$smarty->assign("ime", $ime);
	$smarty->assign("prezime", $prezime);
	$smarty->assign("email", $email);
	$smarty->assign("username", $username);

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
	if (empty($username))
	{
		$greske ['username'] = "Korisničko ime nije uneseno!";
		$smarty -> assign("noUsername", $greske['username']);
	}
	if (empty($password))
	{
		$greske ['password'] = "Lozinka nije unesena!";
		$smarty -> assign("noPassword", $greske['password']);
	}
	
	
	if($_FILES['avatar']['size'] > 0)
	{
	
		if($_FILES["avatar"]["type"] == "image/jpeg" || $_FILES["avatar"]["type"] == "image/pjpeg")
		{	
			$image_source = imagecreatefromjpeg($_FILES["avatar"]["tmp_name"]);
		}		
			
		if($_FILES["avatar"]["type"] == "image/gif")
		{	
			$image_source = imagecreatefromgif($_FILES["avatar"]["tmp_name"]);
		}				
			
		if($_FILES["avatar"]["type"] == "image/x-png")
		{
			$image_source = imagecreatefrompng($_FILES["avatar"]["tmp_name"]);
		}
				
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
			if (is_dir("uploads/avatars/$username/") == false)
			{
				mkdir("uploads/avatars/$username/", 0777);
				$uploadDir = "uploads/avatars/$username/"; 
				$filePath = $uploadDir . $fileName ;
				$uploadPic = move_uploaded_file($tmpName, $filePath);
			}
			if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes($fileName);
				$filePath = addslashes($filePath);
			}
			
			$max_upload_width = 40;
			$max_upload_height = 30;
			mkdir("uploads/avatars/$username/thumb/", 0777);
			$remote_file = "uploads/avatars/$username/thumb/".$_FILES["avatar"]["name"];
			imagejpeg($image_source,$remote_file,100);
			//chmod($remote_file,0777);
			
			list($image_width, $image_height) = getimagesize($remote_file);
			
			if($image_width>$max_upload_width || $image_height >$max_upload_height){
				$proportions = $image_width/$image_height;
				
				if($image_width>$image_height)
				{
					$new_width = $max_upload_width;
					$new_height = round($max_upload_width/$proportions);
				}		
				else{
					$new_height = $max_upload_height;
					$new_width = round($max_upload_height*$proportions);
				}		
				
				
				$new_image = imagecreatetruecolor($new_width , $new_height);
				$image_source = imagecreatefromjpeg($remote_file);
				
				imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
				imagejpeg($new_image,$remote_file,100);
				
				imagedestroy($new_image);
			}
			imagedestroy($image_source);
			$thumbPath = "uploads/avatars/$username/thumb/".$_FILES['avatar']['name'];
			move_uploaded_file($_FILES["avatar"]["tmp_name"],$thumbPath);
			
		
			
		}
	}
	if ($_POST['recaptcha_response_field'])
	{
	 $resp = recaptcha_check_answer($privatekey,
	                                $_SERVER["REMOTE_ADDR"],
	                                $_POST["recaptcha_challenge_field"],
	                                $_POST["recaptcha_response_field"]);

	  if (!$resp->is_valid) 
	  {
	  	$greske['captcha'] = "Pogresan kod!";
	    $smarty->assign("recaptcha_err", $greske['captcha']);
	  }
	}
	else
	{
		$greske['captcha'] = "Pogresan kod!";
	    $smarty->assign("recaptcha_err", $greske['captcha']);
	}
	if (strlen($password) < 6)
	{
		$greske['password'] = "Lozinka mora imati više od 6 znakova.";
		$smarty->assign("passwordError", $greske['password']);
	}
	else if ( !preg_match("#[0-9]+#", $password) ) 
	{
		$greske['password'] = "Lozinka mora imati barem jedan broj";
		$smarty->assign("passwordError", $greske['password']);
	}
	else if ( !preg_match("#[a-z]+#", $password) ) 
	{
		$greske['password'] = "Lozinka mora imati barem jedno slovo!";
		$smarty -> assign("passwordError", $greske['password']);
	}
	else if( !preg_match("#[A-Z]+#", $password) ) 
	{
		$greske['password'] = "Lozinka mora sadržavati barem jedno veliko slovo ";
		$smarty -> assign("passwordError", $greske['password']);
	}
	else if( !preg_match("#\W+#", $password) ) 
	{
		$greske['password'] = "Lozinka mora sadržavati barem jedan simbol (#, $, %, & ...)";
		$smarty -> assign("passwordError", $greske['password']); 
	}
	
	if (empty($re_password))
	{
		$greske ['re_password'] = "Ponovite lozinku!";
		$smarty -> assign ("noRePass", $greske['re_password']);
	}
	if ($password !== $re_password)
	{
		$greske ['re_password'] = "Lozinke se ne podudaraju!";	
		$smarty -> assign("noPassMatch", $greske['re_password']);
	}
	
	$result = mysql_query("SELECT * FROM korisnik WHERE username = '".$username ."'");
	
	if (mysql_num_rows($result) == 1)
	{
		$greske ['zauzeto'] = "Postoji taj korisnik.";	
		$smarty -> assign("usernameTaken", $greske['zauzeto']);
	}

if(empty($greske))
		{
			$defaultAvatar = addslashes("uploads/avatars/default/default_avatar.png");
			$activation_code = mt_rand() . mt_rand() . mt_rand() .mt_rand() . mt_rand();
			//$cr_date = date("Y-m-d H:i:s");
			//$exp_act = date('Y-m-d H:i:s', strtotime($cr_date .' +1 day'));
			$cr_date = getTime();
			$cr_d = date("d.m.Y H:i:s",$cr_date);
			$exp_act = date('Y-m-d H:i:s', strtotime($cr_d . ' +1 day'));
			if(isset($filePath)) 
			{
				mysql_query("INSERT INTO korisnik (tip_korisnika_id_tipa_korisnika, Ime, prezime, e_mail, username, lozinka, status_korisnika, avatar,thumbnail,  aktivacijski_kod, aktivacijski_datum) VALUES ('1', '$ime', '$prezime', '$email', '$username', '$password', '0', '$filePath', '$thumbPath', '$activation_code', '$exp_act')") or die(mysql_error());
				//mysql_query("INSERT INTO korisnik (tip_korisnika_id_tipa_korisnika, Ime, prezime, e_mail, username, lozinka, status_korisnika, avatar, aktivacijski_kod, datum_aktivacije) VALUES ('1', '$ime', '$prezime', '$email', '$username', '$password', '0', '$filePath','$activation_code', '$exp_act')") or die(mysql_error());
				//mysql_query("INSERT INTO korisnik (tip_korisnika_id_tipa_korisnika, Ime, prezime, e_mail, username, lozinka, status_korisnika, avatar, thumbnail, aktivacijski_kod, datum_aktivacije) VALUES ('1', '$ime', '$prezime', '$email', '$username', '$password', '0', '$filePath','$thumbPath', '$activation_code', '$exp_act')") or die(mysql_error());
			}
			else  
			{
				mysql_query("INSERT INTO korisnik (tip_korisnika_id_tipa_korisnika, Ime, prezime, e_mail, username, lozinka, status_korisnika, avatar, aktivacijski_kod, aktivacijski_datum) VALUES  ('1', '$ime', '$prezime', '$email', '$username', '$password', '0', '$defaultAvatar', '$activation_code', '$exp_act')") or die(mysql_error());
				//mysql_query("INSERT INTO korisnik (tip_korisnika_id_tipa_korisnika, Ime, prezime, e_mail, username, lozinka, status_korisnika, avatar, aktivacijski_kod, datum_aktivacije) VALUES  ('1', '$ime', '$prezime', '$email', '$username', '$password', '0', '$defaultAvatar', '$activation_code', '$exp_act')") or die(mysql_error());
				
			}
			$uspjeh ['spremljeno'] = "Uspješno spremljeni podaci u bazu.<br/>Vaš račun je trenutno neaktivan. Aktivacijski mail je poslan na vašu adresu i vrijedi 24h. Molim vas aktivirajte svoj račun.";
			$smarty -> assign("insertSuccessful", $uspjeh['spremljeno']);
			
			//unos u dnevnik
			$log = "logger.txt";
			$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
			$korisnik = $ime . " " . $prezime;
			$time = getTime();
			$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '". $korisnik . "' se upravo registrirao na stranicu.\n";                        
			fwrite($fileHandler, $unos1);
			fclose($fileHandler);
			
			
			$subject = "Aktivacijski kod za webdip!";
			$message = "Postovanje,  $ime!\nKako bi aktivirali svoj racun molim slijedite sljedeci link:\nhttp://arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_090/aktivacija.php?$activation_code\nAktivacijski link vrijedi 24h.";
			$headers = 'From: noreply@webdip_090.com' . 'X-Mailer: lurajcevi-webdip';
			mail($email, $subject, $message, $headers);
			createXML();
			$smarty->display("predlozak_tpl.tpl");
			
		}
	else
		{
			
			$smarty->display("lurajcevi_02_registration.tpl");
		
		}





}
?>
