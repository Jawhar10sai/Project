<?php


	/*$host_m = "mysql51-37.bdb";
	$user_m = "lavoieexdata";
	$database_m = "lavoieexdata";
	$password_m = 'L08v11xp12';*/

	$host_m = "127.0.0.1";
	$user_m = "root";
	$database_m = "lavoieexdata";
	$password_m = '';

	
	$connect_m = mysql_connect($host_m,$user_m,$password_m) or dir(mysql_error());
	mysql_select_db($database_m,$connect_m);

	mysql_query("SET CHARACTER SET 'utf8'", $connect_m);
	mysql_set_charset('utf8',$connect_m);




?>
