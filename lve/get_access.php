<?php include_once('config/connect.php');include_once('config/connect_m.php');

$idsite = $_POST['id_site'];
$idpage = $_POST['id_page'];
$login = $_POST['login'];
$mot_passe = $_POST['mot_passe'];
$acces = $_POST['acces'];

	if($acces == 1){
$pages = "SELECT * FROM secure_page  WHERE id_site = '".$idsite."' AND id_page = '".$idpage."' AND password = MD5('".$mot_passe."')";
$req_pages  = mysql_query($pages ,$connect);
	}else if($acces == 2){
$pages = "SELECT * FROM espace_securise WHERE id_site = '".$idsite."' AND email = '".$login."' AND mot_passe = '".$mot_passe."'";
$req_pages  = mysql_query($pages ,$connect_m);
	}
$row_pages  = mysql_fetch_array($req_pages);
$exist_pages  = mysql_num_rows($req_pages);

if($exist_pages > 0){
	$_SESSION['nom_acces'] = $row_pages['nom_prenom'];
	$_SESSION['id_acces'] = $row_pages['id'];
	$_SESSION['access_page'] = $idpage;
	echo '1';
}else{
	$_SESSION['access_page'] = '';
	$_SESSION['nom_acces'] = '';
	$_SESSION['id_acces'] = '';
	echo 'Votre login ou mot de passe est incorrect!';
}

?>

  