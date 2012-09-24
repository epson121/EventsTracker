<?php
function spojiSeNaBazu()
{
	
	$username = "WebDiP2011_090";
	$password = "admin_beyh";
	$database; 
	$database = "WebDiP2011_090";
	
	/*
	$username = "root";
	$password = "";
	$database;
	$database = "webdip";
	*/
	GLOBAL $connection;
	$connection = mysql_connect('localhost', $username, $password);
	mysql_query('SET NAMES utf8');
	if (!$connection)
		{
			die('Could not connect to database');
		}
	
	echo mysql_error($connection);
	$db = @mysql_select_db($database); 
	if (!$db) 
	{
		die("Unable to select database" . mysql_error() );
	};
}

?>