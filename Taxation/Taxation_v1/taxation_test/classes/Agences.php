<?php
/**
 *
 */
 require_once("conftaxDB.php");
class Agence
{

  function __construct()
  {
    // code...
  }
  /*valider la connexion de l'agence*/
  public function connectagence($login,$mdpss){
    $conn = $GLOBALS['conn'];
    $res = $conn->query("SELECT * FROM `client_lve_session` WHERE `LOGIN`= '$login' AND `MOT_D_PASS`='$mdpss' LIMIT 1");
    return $res;
  }
  /*tester la connexion de l'agence*/
  public function siconnecte($id){
    $conn = $GLOBALS['conn'];
    $res = $conn->query("SELECT * FROM `client_lve_session` WHERE `AGENCE_COD`='$id'");
    foreach ($res as $key) {
      if ($key['IDENTITE_TYP']==='co') {
        return 'co';
      }else {
        return 'de';
      }
    }

  }
  /*connecter l'agence*/
  public function connecte($id){
    $conn = $GLOBALS['conn'];
    $res = $conn->query("UPDATE `client_lve_session` SET `IDENTITE_TYP`='co'  WHERE `AGENCE_COD`='$id'");
  }
  /*deconnecter l'agence*/
  public function deconnecte($id){
    $conn = $GLOBALS['conn'];
    $res = $conn->query("UPDATE `client_lve_session` SET `IDENTITE_TYP`='de'  WHERE `AGENCE_COD`='$id'");
  }
 public function AjouterAgence($id,$aglib){
   $conn = $GLOBALS['conn'];
   $res = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$id);
   $nbrcl = $res->num_rows;
   foreach ($res as $key) {
     if ($key['intervalag_deb']<$key['intervalag_fin']) {
       $interval = $key['intervalag_deb']+1;
       $cod = $key['NOM']."/".(string)$interval;
       $codd = sha1($cod);
       $conn->query("INSERT INTO `client_lve_session`(`AGENCE_COD`, `AGENCE_LIB`, `REFERENCIEE`, `LOGIN`, `MOT_D_PASS`) VALUES ('$cod','$aglib',$id,'$cod','$codd')");
       $conn->query("UPDATE `client_lve` SET `intervalag_deb`=$interval WHERE `CLIENT_ID`=".$id);
     }
   }
 }

 /* liste des session de l'utulisateur en compte*/
 public function mesAgences($id){
   $conn = $GLOBALS['conn'];
     $clis = $conn->query("SELECT * FROM `client_lve_session` WHERE `REFERENCIEE`=".$id);
       return $clis;
 }

 /*Liste des agences de la voie express*/
 public function nosAgences(){
   $conn = $GLOBALS['conn'];
     $clis = $conn->query("SELECT * FROM `agence`");
     $nbrclis = $clis->num_rows;
     if ($nbrclis>0) {
       return $clis;
     }
 }


}
 ?>
