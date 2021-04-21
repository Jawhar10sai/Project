<?php
#fichier de suppression
include_once "classes/fetchclas.php";
include_once "control_utilisateur.php";
if (isset($_POST['supprimer_declaration'])) {
  $declarations = Declarations::TrouverDeclaration($_POST['supnumero']);
  $declarations->commit_par = $nom_d_utilisateur;
  $declarations->SupprimerDeclaration();
  header('location: Déclarations');
}
if (isset($_POST['annuler_carnet'])) {
  $_POST['motif'] = (!empty($_POST['motif'])) ? $_POST['motif'] : '';
  $client_lve->AnnulerCarnet($_POST['motif']);
}
if (isset($_POST['supprimer_session'])) {
  $messessions = Clientsession::TrouverSession($_POST['suppsession']);
  $messessions->commit_par = $nom_d_utilisateur;
  $messessions->SupprimerSession();
  header('location: Mes_sessions');
}
