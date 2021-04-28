<?php
#Exportation des déclarations de la page de consultation et la page de tracking
require_once "control_utilisateur.php";
$donnees  = array();
if (isset($_POST['export_tracking'])) {
  #Exportation du tableau du tracking
  $donnees = file_get_contents($client_lve->NOM . "excel_tracking.json");
  $donnees = json_decode($donnees, true);
  $client_lve->ExporterMesCourriers($donnees);
  unlink($client_lve->NOM . "excel_tracking.json");
}
if (isset($_POST['export_declaration'])) {
  #Exportation du tableau de Consultation
  $donnees = file_get_contents($client_lve->NOM . "excel_declaration.json");
  $donnees = json_decode($donnees, true);
  $client_lve->ExporterMesDeclarations($donnees);
  unlink($client_lve->NOM . "excel_declaration.json");
}
