<?php 
include_once('config/connect.php');

$id_bloc 	= $_POST['id'];
$partage = 0;
$id = "SELECT partge FROM contenu where id = '".$id_bloc."'";
	$req_id  = mysql_query($id ,$connect);
	$row_id  = mysql_fetch_array($req_id);
	$num_id  = mysql_num_rows($req_id);

		if($row_id['partge'] == 0){
			$partage = 1;
			}else{
			$partage = 0;
			}
		$query = "UPDATE contenu SET partge = '".$partage."' WHERE id = '".$id_bloc."'";
		mysql_query($query) or die('Error, insert query failed');	
		echo $partage;

?>