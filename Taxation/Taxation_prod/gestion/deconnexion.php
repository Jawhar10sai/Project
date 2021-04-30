<?php
#Deconnecter de l'application
require_once('control_utilisateur.php');
if ($_SESSION['type_utilisateur'] == "client") {
  $client_lve->IDENTITE_TYP = "de";
  $client_lve->commit_par = $nom_d_utilisateur;
  $client_lve->Enregistrer();
  Connexion::TrouverConnexion($_SESSION['id_con'])->Deconnecter();
} elseif ($_SESSION['type_utilisateur'] == "session") {
  $messessions->IDENTITE_TYP = "de";
  $messessions->commit_par = $nom_d_utilisateur;
  $messessions->ModifierSession($nom_d_utilisateur);
  Connexion::TrouverConnexion($_SESSION['id_con'])->Deconnecter();
}
unlink(trim($client_lve->CLIENT_COD) . trim("excel_tracking.json"));
unlink($client_lve->NOM . "excel_declaration.json");
session_destroy();
header('location: ../');
