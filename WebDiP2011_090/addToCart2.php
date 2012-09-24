<?php
session_start();
include 'spajanje.php';

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
		$user = $_SESSION['korisnik'];
		$smarty->assign("slika", $_SESSION['avatar'] );
		$smarty->assign("uspjeh", $_SESSION['sesija']);
		$smarty->assign("userName", $_SESSION['korisnik']);
	}


if (isset($_GET['id']))
	{
		$eventId = $_GET['id'];
	}

//id trenutnog korisnika
$sql = "SELECT * FROM korisnik WHERE username = '$user'";
$sql = mysql_query($sql) or die ("Unable to fetch user data");
while ($row = mysql_fetch_assoc($sql))
	{
		$user2 = $row['id_korisnika'];
	}

	//ako je poslan post
if (isset($_POST['ok']))
{
	$eventName = $_POST['ime_eventa'];
	$ticketNo = $_POST['ticketNo'];
	$br_mjesta = $_POST['br_mjesta'];
	if (isset($_POST[prijevoz_cijena]))
	{
		$pr = $_POST[prijevoz_cijena];
	}
	else
	{
		$pr = "0";
	}
	if (isset($_POST[nocenje_cijena]))
	{
		$noc = $_POST[nocenje_cijena];
	}
	else
	{
		$noc = "0";
	}
	$ostalo_mjesta = $br_mjesta - $ticketNo;
	if ($ticketNo == null)
	{
		$smarty->assign("purchaseError", "Niste unijeli broj karti.");
		$smarty->display("predlozak_tpl.tpl");
	}
	else if ($ostalo_mjesta < 0)
	{
		$smarty->assign("purchaseError", "Ne možete kupiti toliko karti.");
		$smarty->display("predlozak_tpl.tpl");
	}
	//spremi u karticu (višedimenzionalno asocijativno polje) 
if (!isset($_SESSION['cart'][$user2][$eventId]))
{
	$_SESSION['cart'][$user2][$eventId] = array(
		'ime_eventa' => $eventName,
		'br_mjesta' => $ticketNo,
		'prijevoz' => $pr,
		'nocenje' => $noc
		);
}
else
{
	
	$cart = $_SESSION['cart']; 
	foreach ($cart as $i => $userId)
	{
		foreach ($userId as $eventId => $event)
			{
				echo $eventId;
				if ($event['ime_eventa'] == $eventName)
				{
					echo "shit";
					$event['br_mjesta'] += $ticketNo;
					$event['prijevoz'] = $pr;
					$event['nocenje'] = $noc;

					$_SESSION['cart'][$user2][$eventId] = array(
						'ime_eventa' => $event['ime_eventa'],
						'br_mjesta' => $event['br_mjesta'],
						'prijevoz' => $event['prijevoz'],
						'nocenje' => $event['nocenje']
						);
				}
			}
	}

}


$smarty->assign("successfullAddingToCart", "Uspješno ste dodali događaj u košaricu.");
$smarty->display("predlozak_tpl.tpl");

}

	
?>