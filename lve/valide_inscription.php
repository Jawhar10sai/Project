<?php 
include_once('config/connect_m.php');

$site 	= $_GET['site'];
$id 	= $_GET['id'];


$query="SELECT * FROM espace_securise WHERE id_site = '".$site."' AND id = '".$id."'";
	$req_query = mysql_query($query ,$connect_m);
	$tab_query = mysql_fetch_assoc($req_query);
	$num_query = mysql_num_rows($req_query);
	
	if($num_query > 0){
		

		
		
		
		$query = "UPDATE espace_securise SET etat = '1' WHERE id_site = '".$site."' AND id = '".$id."'";
		mysql_query($query,$connect_m) or die('Error, insert query failed');
		
		
		
	$_SESSION['nom_acces'] = $tab_query['nom_prenom'];
	$_SESSION['id_acces'] = $tab_query['id'];
			?>
	<script language="javascript">
	
	document.location.href="/";
	
	</script>	
		
<?php	}

?>