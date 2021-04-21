<?php
include_once('config/connect.php');


		
 	$id_page = $_GET['idpage'];

 	$pages = "SELECT parametre FROM pages where id = '".$id_page."'";
	$req_pages  = mysql_query($pages ,$connect);
	$row_pages  = mysql_fetch_array($req_pages);
	$exist_pages  = mysql_num_rows($req_pages);
	
	echo $row_pages['parametre'];
	exit();


?>	