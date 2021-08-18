<?php
#Gestion de la connexion des utilisateurs
if (!isset($_SESSION))
  session_start();
require_once "classes/fetchclas.php";
if (isset($_POST['nomuser'])) {
  $client_lve = ClientLve::VerifierCompte($_POST['nomuser'], sha1($_POST['mdpass']));
  $admin = Admins::VerifierCompte($_POST['nomuser'], sha1($_POST['mdpass']));
  $messessions = ClientSession::VerifierCompte($_POST['nomuser'], sha1($_POST['mdpass']));

  if ($client_lve) {
    $connexion = new Connexion;
    $connexion->id_utilisateur = $client_lve->CLIENT_ID;
    $connecte = $connexion->Connecter();
    if ($connecte) {
      $_SESSION['id_con'] = $connecte;
      $_SESSION['type_utilisateur'] = "client";
      $_SESSION['user_id'] =  $client_lve->CLIENT_ID;
      $client_lve->commit_par = $client_lve->NOM;
      $client_lve->IDENTITE_TYP = "co";
      $client_lve->Enregistrer();
      echo ($client_lve->CLIENT_TYP == "TR" || $client_lve->CLIENT_TYP == "TRL") ? "Tracking" : "reussite";
      exit;
    }
  } elseif ($messessions) {
    $connexion = new Connexion;
    $connexion->id_utilisateur = $client_lve->CLIENT_ID;
    $connexion->type_utilisateur = "session";
    $connecte = $connexion->Connecter();
    if ($connecte) {
      $_SESSION['id_con'] = $connecte;
      $messessions->commit_par = $messessions->AGENCE_LIB;
      $messessions->IDENTITE_TYP = "co";
      $messessions->ModifierSession();
      $_SESSION['user_id'] = $messessions->AGENCE_COD;
      $_SESSION['type_utilisateur'] = "session";
      $client_lve = ClientLve::TrouverClient($messessions->REFERENCIEE);
      echo ($client_lve->CLIENT_TYP == "TR" || $client_lve->CLIENT_TYP == "TRL") ? "Tracking" : "reussite";
      exit;
    }
  } elseif ($admin) {
    $connexion = new Connexion;
    $connexion->id_utilisateur = $admin->id_admin;
    $connexion->type_utilisateur = "admin";
    $connecte = $connexion->Connecter();
    if ($connecte) {
      $_SESSION['id_con'] = $connecte;
      $_SESSION['type_utilisateur'] = "admin";
      $_SESSION['user_id'] =  $admin->id_admin;
      echo "admin";
      exit;
    }
  } else {
    echo "non trouve";
    exit;
  }
}
