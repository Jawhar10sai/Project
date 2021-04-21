<?php
if (!isset($_SESSION))
  session_start();

include_once "classes/fetchclas.php";
if ($_SESSION['user_id']) {
  if ($_SESSION['type_utilisateur'] == "session") {
    $messessions = ClientSession::TrouverSession($_SESSION['user_id']);
    $client_lve = ClientLve::TrouverClient($messessions->REFERENCIEE);
    $nom_d_utilisateur = utf8_encode($client_lve->NOM . " - " . $messessions->AGENCE_LIB);
  } else {
    $client_lve = ClientLve::TrouverClient($_SESSION['user_id']);
    $nom_d_utilisateur = utf8_encode($client_lve->NOM);
  }
} else {
  header('location: gestion/deconnexion.php');
}
