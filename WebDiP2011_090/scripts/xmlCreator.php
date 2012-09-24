<?php 
function createXML()
{
	 $result = mysql_query("SELECT username FROM korisnik");
	 $num = mysql_num_rows($result);
	 
	 $xml_output = "<?xml version=\"1.0\"?>\n"; 
	 $xml_output .=  "<entries>\n";
	 
	 for($x =  0 ; $x < mysql_num_rows($result) ; $x++)
	 { 
     	$row =  mysql_fetch_assoc($result); 
	    $xml_output .=  "\t\t<username>" . $row['username'] . "</username>\n"; 
 	  }
	 
	 $xml_output .=  "</entries>"; 
	 $xmlFile = fopen('scripts/usersXml.xml', 'w');
	 fwrite($xmlFile, $xml_output);
	 fclose($xmlFile);
}

?>
