<?php require_once( "../../../../config/connect.php" );

	
	if(isset($_POST["action"]) && $_POST["action"] == "parrainage"){
	$id_site = $_POST['id_site'];
	$id = $_POST['id'];
	$emails = explode(",",$_POST['emails']);
	
		for($i = 0 ; $i < count($emails) ; $i++){
		mysql_query( "INSERT INTO parrainage (id_site,id_parent,email) VALUE ('".$id_site."','".$id."','".$emails[$i]."')" );
		
		}
		
		echo "<p>Merci pour votre participation!</p>";
		}
	?>