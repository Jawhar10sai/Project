<?php
#Retourne l'agence d'une ville donnée
require_once("classes/fetchclas.php");
if (isset($_POST['code_ville'])) {
	if($villes->LIBAagence($villes->AgenceVille($_POST['code_ville']))!="--")
		echo "Destination: Agence  ".$villes->LIBAagence($villes->AgenceVille($_POST['code_ville']));
	else
		echo "cette ville n'appartient à aucune agence";
}else
    echo "Veillez vous choisir la ville de destination";
?>
