<?php
include_once('../config/connect.php');


		
 	$idpays = $_GET['idpays'];

 	$pages = "SELECT code FROM pays where idpays like '".utf8_decode($idpays)."'";
	$req_pages  = mysql_query($pages ,$connect);
	$row_pages  = mysql_fetch_array($req_pages);
	
	echo $row_pages['code'];
	exit();


?>	