<?php session_start();
	/*
	$host = "mysql51-37.bdb";
	$user = "lavoieexdata";
	$database = "lavoieexdata";
	$password = 'L08v11xp12';*/
	$host = "127.0.0.1";
	$user = "root";
	$database = "lavoieexdata";
	$password = '';


	$connect = mysql_connect($host,$user,$password) or dir(mysql_error());
	mysql_select_db($database,$connect);

	mysql_query("SET CHARACTER SET 'utf8'", $connect);
	mysql_set_charset('utf8',$connect);



?>
