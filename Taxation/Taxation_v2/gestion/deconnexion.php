<?php
#require_once('txheads.php');
#Deconnecter de l'application
require_once('classes/fetchclas.php');
require_once('control_utilisateur.php');
if ($_SESSION['type_utilisateur'] == "client") {
  $client_lve->IDENTITE_TYP = "de";
  $client_lve->ModifierClient($nom_d_utilisateur);
  $connexion->TrouverConnexion($_SESSION['id_con']);
  $connexion->Deconnecter();
}elseif ($_SESSION['type_utilisateur'] == "session") {
  $messessions->IDENTITE_TYP="de";
  $messessions->ModifierSession($nom_d_utilisateur);
}
session_destroy();
header('location: ../');
 ?>
