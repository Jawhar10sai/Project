<?php
session_start();
require_once("classes/conftaxDB.php");
require_once("classes/fetchclas.php");
if ($_REQUEST['idcli']) {
header('Content-type: application/json');
   $idcli = strip_tags($_POST['idcli']);
   $iduser = $_SESSION['user_id'];
   $result = array();
   //$idcli = '55555';
   //$iduser = 4;

   $clits = $conn->query("SELECT * FROM `client` WHERE `CLIENT_ID_client_lve`=$iduser AND `CLIENT_COD`='$idcli'");
   $adres = $adresses->derniereadresseClient($idcli);
   $nbrad = $adres->num_rows;
   if ($nbrad>0) {
     foreach ($adres as $adre) {
       $result[]['VILLE_LIB'] = $adre['VILLE_LIB'];
       $result[]['VILLE_COD'] = $villes->VilleID($adre['VILLE_LIB']);
       $result[]['lib_adresse'] = $adre['lib_adresse'];
       $result[]['count'] = $nbrad;

     }
   }else {
     $result['VILLE_LIB'] = "";
     $result['VILLE_COD'] = '';
     $result['lib_adresse'] = "";
     $result[]['count'] = 0;
   }
   $rowCount = $clits->num_rows;
   if($rowCount > 0){
     while ($json = $clits->fetch_assoc()) {
       $result[]=$json;
     }
     }
      echo json_encode($result);
      exit;
 }

?>
