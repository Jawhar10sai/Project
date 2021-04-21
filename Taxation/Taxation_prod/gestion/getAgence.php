<?php
#Retourne l'agence d'une ville donnée
require_once("classes/fetchclas.php");
if (isset($_POST['code_ville'])) {
	$villes = Villes::TrouverVille($_POST['code_ville']);
	$agence = $villes->Aagence();
	if ($agence)
		echo "Destination: Agence  " . $agence->AGENCE_LIB;
	else
		echo "cette ville n'appartient à aucune agence";
} else
	echo "Veillez vous choisir la ville de destination";
