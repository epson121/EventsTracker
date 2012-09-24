<?php	
	session_start();
	include 'spajanje.php';
	include 'scripts/vrijeme.php';
	spojiSeNaBazu();
	require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
	//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
	$smarty = new Smarty();
	
	//ako je ulogiran korisnik
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
		//$smarty->display("addImageToGallery.tpl");
	}
	else {
			header("location: lurajcevi_02_login.php?err=401");
	}
	
	//pokupi id događaja
	if (isset($_GET['id']))
	{
		$eventId = $_GET['id'];
	}
	
	//spremi ime korisnika
	$user = $_SESSION['korisnik'];
	
		//ako je uploadana slika
		if($_FILES['uploadPicture']['size'] > 0)
		{
			
			if($_FILES["uploadPicture"]["type"] == "image/jpeg" || $_FILES["uploadPicture"]["type"] == "image/pjpeg")
			{	
				$image_source = imagecreatefromjpeg($_FILES["uploadPicture"]["tmp_name"]);
			}		
				
			if($_FILES["uploadPicture"]["type"] == "image/gif")
			{	
				$image_source = imagecreatefromgif($_FILES["uploadPicture"]["tmp_name"]);
			}				
				
			if($_FILES["uploadPicture"]["type"] == "image/x-png")
			{
				$image_source = imagecreatefrompng($_FILES["uploadPicture"]["tmp_name"]);
			}
					
			$fileName = $_FILES['uploadPicture']['name'];
			$tmpName = $_FILES['uploadPicture']['tmp_name'];
			$fileSize = $_FILES['uploadPicture']['size'];
			$fileType = $_FILES['uploadPicture']['type'];
			
			//ukoliko tip slike nije podržan
			$ext = end(explode('.', $fileName));
			if (($ext != 'gif') && ($ext != 'jpg') && ($ext != 'png') )
			{
					$greske['tip_slike'] = "Tip slike nije podržan. ".$ext;
					$smarty -> assign ("baduploadPictureType", $greske['tip_slike']);
			}
			else
			{
				//spremi sliku
				//mkdir("uploads/uploadPictures/$username/", 0777);
				$uploadDir = "uploads/gallery/"; 
				$pathOriginal = $uploadDir . $fileName ;
				$uploadPic = move_uploaded_file($tmpName, $pathOriginal);
				if(!get_magic_quotes_gpc())
				{
					$fileName = addslashes($fileName);
					$pathOriginal = addslashes($pathOriginal);
				}
				
				$max_upload_width = 40;
				$max_upload_height = 30;
				
				
				//skripta za kreiranje thumbnaila (za resize slike)
				$remote_file = "uploads/gallery/thumb/".$_FILES["uploadPicture"]["name"];
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
				$thumbPath = "uploads/gallery/thumb/".$_FILES['uploadPicture']['name'];
				move_uploaded_file($_FILES["uploadPicture"]["tmp_name"],$thumbPath);
			
		
			
			}
		$namePicture = $_POST['namePicture'];
		$descriptionPicture = $_POST['descriptionPicture'];
		
		//unesi sliku u bazu
		$sql = "INSERT INTO slika (dogadaj_id_dogadaj, naziv_slike, path_slike, path_slike_thumb, opis_slike, autor) VALUES ('$eventId', '$namePicture' , '$pathOriginal', '$thumbPath', '$descriptionPicture', '$user')";
		$sql = mysql_query($sql) or die(mysql_error());
		$log = "logger.txt";
		
			//zapiši to u dnevnik
			$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
			$time = getTime();
			$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " Slika '". $namePicture . "' je dodana u sustav.\n";                        
			fwrite($fileHandler, $unos1);
			fclose($fileHandler);
		header("location:eventDetails.php?id=". $eventId . "");
		
		}
		
		else
			{
				$smarty->assign("greska", "Problem prilikom uploada!");
				$smarty->display("addImageToGallery.tpl");
			}

	
	
	
	
	
	
?>