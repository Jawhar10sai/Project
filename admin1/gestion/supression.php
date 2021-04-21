<?php
require_once('../../classes/fetchclas.php');
require_once('../../classes/conftaxDB.php');
if (isset($_POST['suppression_adresse'])) {
  $adresses->ArchiverAdresse($_POST['idadre']);
  $adresses->SupprimerAdresse($_POST['idadre']);
  header('location: index.php?p=ADAdresses');
}
if (isset($_POST['suppression_agence'])) {
  $agence->ArchiverAgence($_POST['id_agence']);
  $agence->SupprimerDeclaration($_POST['id_agence']);
  header('location: index.php?p=ADdeclaration');
}
if (isset($_POST['suppression_declaration'])) {
  $declaration->ArchiverDeclaration($_POST['id_declaration']);
  $declaration->SupprimerDeclaration($_POST['id_declaration']);
  header('location: index.php?p=ADdeclaration');
}
if (isset($_POST['suppression_pr'])) {
  $villes->ArchiverPointsrelais($_POST['idadre']);
  $villes->SuppimerPointsrelais($_POST['idadre']);
  header('location: index.php?p=ADpr');
}
if (isset($_POST['suppression_reclamation'])) {
  $clients->ArchiverUser($_POST['id_reclamation']);
  $clients->SuppimerUser($_POST['id_reclamation']);
  header('location: index.php?p=ADuser');
}
if (isset($_POST['suppression_utilisateur'])) {
  $clients->ArchiverUser($_POST['id_utilisateur']);
  $clients->SuppimerUser($_POST['id_utilisateur']);
  header('location: index.php?p=ADuser');
}
if (isset($_POST['suppression_ville'])) {
  #$villes->ArchiverVille($_POST['id_ville']);
  $villes->SupprimerVille($_POST['id_ville']);
  header('location: ../?p=ADvilles');
}
if (isset($_POST['suppression_session'])) {
    $agence->ArchiverSession($_POST['id_session']);
    $agence->SupprimerSession($_POST['id_session']);
    header('location: index.php?p=ADvilles');
}
?>
