<?php
include_once('../config/connect.php');
	
if(isset($_POST['action']) && $_POST['action'] = 'get_id_page'){
	
	$idpage = "SELECT nom FROM pages WHERE id_site = '".$_POST['idsite']."' AND id = '".$_POST['id_page']."'";
	$req_idpage  = mysql_query($idpage,$connect);
	$row_idpage  = mysql_fetch_assoc($req_idpage);
	echo  $row_idpage["nom"];
	exit();
	}

		
 	
	
	



?>	