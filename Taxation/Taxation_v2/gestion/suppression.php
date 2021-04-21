<?php
#fichier de suppression
include_once "classes/fetchclas.php";
include_once "control_utilisateur.php";
if (isset($_POST['supprimer_declaration'])) {
  $declarations->TrouverDeclaration($_POST['supnumero']);
  $declarations->SupprimerDeclaration($nom_d_utilisateur);
  header('location: Déclarations');
}
if (isset($_POST['annuler_carnet'])) {
  $carnet = $client_lve->carnetEncours();
  $motif = $_POST['motif'];
  $conn->query("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now(),`motif_annulation`='$motif' WHERE `numeroCarnet`=".$carnet);
  $valide = $conn->query("UPDATE `ramasse` SET `code_ramassage`='0' WHERE `numeroCarnet`=".$carnet);
}
if (isset($_POST['supprimer_session'])) {
  $messessions->TrouverSession($_POST['suppsession']);
  $messessions->SupprimerSession($nom_d_utilisateur);
  header('location: Mes_sessions');
}
 ?>
