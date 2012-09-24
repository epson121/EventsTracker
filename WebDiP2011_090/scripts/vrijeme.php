<?php
	function setTime()
	{
	
	
	$pomak = 0;	
	$xml = "http://arka.foi.hr/PzaWeb/PzaWeb2004/config/pomak.xml";
	
	$dat = fopen($xml,'r');      
	$podaci = fread($dat, 10000);
	fclose($dat);
		      
	$domobj = new DOMDocument;
	$domobj->loadXML($podaci);
	$params = $domobj->getElementsByTagName('pomak');
	
	foreach ($params as $par)
	{
			foreach ($par->attributes as $attribute=> $val)
			{
				if($attribute == "brojSati")
				{
					$pomak = $val->nodeValue;
				}
			}
	}
	$sql = mysql_query("UPDATE vrijeme SET pomak =$pomak WHERE id_pomak = '1'") or die('Can\'t insert data');
	}
	
	function getTime()
	{
		
		$sql = "SELECT pomak FROM vrijeme WHERE id_pomak = 1";
		$q = mysql_query($sql);
		while($red = mysql_fetch_array($q)) {
				$off = $red['pomak'];
			}
		$server = time();
		$vrijeme = time() + $off*60*60;
		return $vrijeme;
	}

?>