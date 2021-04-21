<?php
session_start();

//header("Location : index.php");

include_once('config/connect.php');

	$_SESSION['nom_acces'] = ''; 
	$_SESSION['id_acces'] = ''; 
	$_SESSION['access_page'] = '';


?>
<script language="javascript">
document.location.href ="/";
</script>
