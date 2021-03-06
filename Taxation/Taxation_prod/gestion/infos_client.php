<?php
#Recheche du client Par code ou par nom
include_once "control_utilisateur.php";
if (isset($_POST['code_client']) && $_POST['code_client'] != '0') {
  $infosclient = array();
  $sous_client = $client_lve->MonClient($_POST['code_client']);
  if ($sous_client) {
    $adresses = $sous_client->DerniereAdresse();
    $villes = Villes::TrouverVille($adresses->id_ville);
    $infosclient['NOM'] = $sous_client->NOM;
    $infosclient['PRENOM'] = $sous_client->PRENOM;
    $infosclient['ADRESSE'] = $adresses->lib_adresse;
    $infosclient['telephone'] = $sous_client->telephone;
    $infosclient['mail'] = $sous_client->mail;
    $infosclient['VILLE_LIB'] = $villes->VILLE_LIB;
    $infosclient['VILLE_COD'] = $villes->VILLE_COD;
    echo json_encode($infosclient);
  } else
    echo "non trouve";
} elseif (isset($_POST['nom_client'])) {
  $output = '';
  $sous_client = $client_lve->MonClientParNom($_POST["nom_client"]);
  $output = '<table style="background-color:#eee;cursor:pointer;">';
  if ($sous_client) {
    foreach ($sous_client as $row) {
      $output .= '<tr class="mtr">';
      $output .= '<td style="padding:12px;">' . $row->NOM . '</td>';
      $output .= '<td style="padding:12px;">' . $row->PRENOM . '</td>';
      $output .= '<td style="padding:12px;">' . $row->CLIENT_COD . '</td>';
      $output .= '</tr>';
    }
  } else {
    $output .= '<tr></tr>';
  }
  $output .= '</table>';
  echo $output;
}
