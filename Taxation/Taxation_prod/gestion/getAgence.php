<?php
#Retourne l'agence d'une ville donnée
require_once("classes/fetchclas.php");
if (isset($_POST['code_vil'])) {
	$villeag = array(
		'ville' => Villes::TrouverVille($_POST['code_vil'])->VILLE_LIB,
		'agence' =>  Agence::TrouverAgence(Villes::TrouverVille($_POST['code_vil'])->AGENCE_COD)->AGENCE_LIB
	);
	echo json_encode($villeag);
} else
	echo "Veillez vous choisir la ville de destination";
