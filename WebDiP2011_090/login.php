<?php
session_start();
include 'spajanje.php';
include 'scripts/vrijeme.php';


spojiSeNaBazu();
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';
$smarty = new Smarty();

if (isset($_SESSION['sesija']))
{
	$smarty->assign("sessionName", $_SESSION['korisnik']);
}

//if(isset($_POST['ok']))
if($_SERVER['REQUEST_METHOD'] === 'POST')
{

	$userName = $_POST['username'];
	$passWord = $_POST['password'];
	if (isset($_POST['remember']))
		$rem = $_POST['remember'];
	

	if(empty($userName) || empty($passWord))
	{
		$greske['prazno'] = "Niste unijeli sve podatke!"; 
		$smarty->assign("emptyInput", $greske['prazno']);
		
	}
	
	$upit = mysql_query("SELECT * FROM korisnik WHERE username = '$userName' AND lozinka = '$passWord' AND status_korisnika = '1'") or die(mysql_error());                         
								
	if (mysql_num_rows($upit))
	{
		$red = mysql_fetch_assoc($upit);
		if($red['tip_korisnika_id_tipa_korisnika'] == "1")
		{
			$login['uspjeh'] = "Uspješna prijava u sustav.";
			//$smarty->assign("uspjeh", $login['uspjeh']);
		
			if (isset($rem))
			{
				setcookie('user', $userName, time()+3600);
			}
			else
			{
				setcookie('user', $userName, time()-36000); 
			}
			$korisnik = $userName;
			$_SESSION["reg_kor"] = "Ok";
			$_SESSION['sesija'] = "Ok";
			$_SESSION['tip'] = "1";
			$_SESSION['korisnik'] = $korisnik;
			$_SESSION['avatar'] = $red['avatar'];
			setcookie(wrong,$_COOKIE['wrong'] + 1, time()-36000);
		}
		else if ($red['tip_korisnika_id_tipa_korisnika'] == "2")
		{
			$login['uspjeh'] = "Uspješna prijava u sustav.";
			//$smarty->assign("uspjeh", $login['uspjeh']);
			
			if (isset($rem))
			{
				setcookie('user',$userName, time()+3600);
			}
			else
			{
				setcookie('user', $userName, time()-36000); 
			}
			
			//echo  "sth";
			$korisnik = $userName;
			$_SESSION['moderator'] = "Ok";
			$_SESSION['sesija'] = "Ok";
			$_SESSION['tip'] = "2";
			$_SESSION['korisnik'] =$korisnik;
			$_SESSION['avatar'] = $red['avatar'];
			setcookie(wrong,$_COOKIE['wrong'] + 1, time()-36000);
		}
		else
		{
			$login['uspjeh'] = "Uspješna prijava u sustav.";
			//$smarty->assign("uspjeh", $login['uspjeh']);
			
			
			if (isset($rem))
			{
				setcookie('user',$userName, time()+3600);
			}
			else
			{
				setcookie('user', "$userName", time()-36000); 
			}
			
			$korisnik = $userName;
			$_SESSION['admin'] = "Ok";
			$_SESSION['sesija'] = "Ok";
			$_SESSION['tip'] = "3";
			$_SESSION['korisnik'] =$korisnik;
			$_SESSION['avatar'] = $red['avatar'];
			setcookie(wrong,$_COOKIE['wrong'] + 1, time()-36000);
		
		}
	}                      
	else 
	{	
			if (isset($_COOKIE['wrong']))
			{
				if ($_COOKIE['wrong'] < 2)
				{
					setcookie(wrong,$_COOKIE['wrong'] + 1, time()+3600);

				}	
				else
				{
					$q = mysql_query("UPDATE korisnik SET status_korisnika = 2 WHERE username = '$userName'") or die(mysql_error());
					$smarty->assign("accessDenied", "Vaš račun je blokiran. Kontaktirajte administratora.");
					setcookie(wrong,$_COOKIE['wrong'] + 1, time()-36000);
				}
			}
			else
			{
				setcookie(wrong, 1, time()+3600);
			}
			$greske['neuspjeh'] = "Pogrešni podaci za prijavu!";
			$smarty->assign("neuspjeh", $greske['neuspjeh']);
			$log = "logger.txt";
			$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
			$time = getTime();
			$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '". $userName . "' se pokušao ulogirati s krivim podacima.\n";                        
			fwrite($fileHandler, $unos1);
			fclose($fileHandler);
			
			
			
			//$failLoginUsername = $userName;
	}         
	if (empty($greske))
	{
		$tod = getTime();
		//echo date("Y-m-d H:i:s", $tod) . "<br/>";
		$s = mysql_query("SELECT * FROM korisnik WHERE aktivacijski_kod != 0 ");
		while($r = mysql_fetch_assoc($s))
		{
			$id = $r['id_korisnika'];
			$time = $r['aktivacijski_datum'];
			$time2 = strtotime($time .' +1 day');
			//echo $time . "     ";
			//echo $id . "<br/>";
			//echo $tod;
			if ($tod > $time2)
			{
				$d = mysql_query("DELETE FROM korisnik WHERE id_korisnika = '$id'");
			}
		}
			$log = "logger.txt";
			$fileHandler = fopen($log, 'a') or die ('Can\'t open file');
			$time = getTime();
			$unos1 = "Log: " . date("d.m.Y H:i:s",$time ). " korisnik '". $userName . "' se ulogirao u sustav.\n";                        
			fwrite($fileHandler, $unos1);
			fclose($fileHandler);
		header("location:lurajcevi_02.php");
	}
	else {
		$smarty->display('lurajcevi_02_login.tpl');
	}
}



?>