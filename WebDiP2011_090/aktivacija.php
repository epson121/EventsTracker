<?php

include 'spajanje.php';
include 'scripts/vrijeme.php';
require '/var/www/Smarty-2.6.6/libs/Smarty.class.php';
//require 'D:\wamp\Smarty-3.1.7\libs\Smarty.class.php';

$smarty = new Smarty();
spojiSeNaBazu();


$url_code = $_SERVER['QUERY_STRING'];
$provjera ="SELECT * FROM korisnik";
$provjera2 = mysql_query($provjera) or die(mysql_error());
	while ($row = mysql_fetch_array($provjera2))
	{
		$actCode = $row['aktivacijski_kod'];
		if ($url_code == $row['aktivacijski_kod'])
			{
				//$today = date("Y-m-d H:i:s");
				$tod = getTime();
				$today = date("d.m.Y H:i:s",$tod);
				$to = strtotime($today);
				$exp = strtotime($row['aktivacijski_datum']);
				if ($tod > $exp)
				{
					//$aktivacijski_link['istekao'] = "Aktivacijski link je istekao, nije moguće potvrditi registraciju, molim registrirajte se ponovo.";
					$del = mysql_query("DELETE FROM korisnik WHERE aktivacijski_kod = '$actCode'") or die(mysql_error());
					$smarty->assign("activationTimedOut", $aktivacijski_link['istekao']);
				}
				else
				{
				$pronadjeno = true;
				$aktivacijski_link ['prihvaceno'] = true;
				mysql_query("UPDATE korisnik SET status_korisnika = 1 WHERE aktivacijski_kod = $url_code");
				mysql_query("UPDATE korisnik SET aktivacijski_kod = 'NULL'  WHERE aktivacijski_kod = $url_code");
				}
			}
	}
if (!$aktivacijski_link['prihvaceno'])
	{
			$aktivacijski_link['odbijeno'] = "Došlo je do pogreške. Moguće je da je aktivacijski kod istekao ili je već iskorišten. Pokušajte ponovno unijeti kod ili se registrirajte ponovo";
			$smarty->assign("rejectedActivation", $aktivacijski_link['odbijeno']);
			$smarty->display("predlozak_tpl.tpl");
	}
else
{
			$aktivacijski_link['uspjesno'] = "Aktivacija uspješna, možete se logirati.";
			$smarty->assign("successfulActivation", $aktivacijski_link['uspjesno']);
			$smarty->display("predlozak_tpl.tpl");
}

?>