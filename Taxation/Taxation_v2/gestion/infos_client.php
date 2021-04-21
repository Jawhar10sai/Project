<?php
#Recheche du client Par code ou par nom
include_once "classes/fetchclas.php";
include_once "control_utilisateur.php";
if (isset($_POST['code_client'])) {
  $infosclient = array();
  if ($sous_client->TrouverUserClientParCode($_POST['code_client'],$client_lve->CLIENT_ID)) {
    foreach ($sous_client->DerniereAdresse() as $adresseclient) {
      $adresses->TrouverAdresse($adresseclient['id_adresse']);
      $villes->TrouverVille($adresseclient['id_ville']);
    }
    $infosclient['NOM'] = $sous_client->NOM;
    $infosclient['PRENOM'] =$sous_client->PRENOM;
    $infosclient['ADRESSE'] = $adresses->adresse;
    $infosclient['telephone'] = $sous_client->telephone;
    $infosclient['VILLE_LIB'] = $villes->VILLE_LIB;
    $infosclient['VILLE_COD'] = $villes->VILLE_COD;
    echo json_encode($infosclient);
  }else
    echo "non trouve";
}elseif (isset($_POST['nom_client'])) {
  $id = $_POST["nom_client"];
    $output = '';
    $query = "SELECT * FROM `client` WHERE `NOM` LIKE '%".$id."%' AND `CLIENT_ID_client_lve` =".$client_lve->CLIENT_ID;
    $result = $conn->query($query);
    $output = '<table style="background-color:#eee;cursor:pointer;">';
    if(mysqli_num_rows($result) > 0)
    {
         foreach ($result as $row) {
            $output .='<tr class="mtr">';
              $output .= '<td style="padding:12px;">'.$row["NOM"].'</td>';
              $output .= '<td style="padding:12px;">'.$row["PRENOM"].'</td>';
              $output .= '<td style="padding:12px;">'.$row["CLIENT_COD"].'</td>';
              $output .='</tr>';
         }
    }
    else
    {
         $output .= '<tr></tr>';
    }
    $output .= '</table>';
    echo $output;
}
 ?>
