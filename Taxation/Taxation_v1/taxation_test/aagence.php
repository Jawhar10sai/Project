<?php
session_start();
require_once("classes/conftaxDB.php");
require_once("classes/fetchclas.php");
if ($_REQUEST['idvill']) {
   $idvil = strip_tags($_POST['idvill']);
$matable = array();
if ($villes->Aagence($idvil)==="a agence") {
$matable['statut'] = 'A agence';
}else {
  $matable['statut'] = 'non';
}
if ($villes->Apointsrelais($idvil)==="a point relai") {
$matable['apointr'] = 'a point relai';
}else {
  $matable['apointr'] = 'non';
}
echo json_encode($matable);

 }



 ?>
