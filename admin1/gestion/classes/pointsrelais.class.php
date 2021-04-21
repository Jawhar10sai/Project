<?php
/**
 *
 */
class PointsRelais
{

  function __construct()
  {

  }

  public function SuppimerPointsrelais($id){
    $conn = $GLOBALS['conn'];
    $conn->query("DELETE FROM `points_relais` WHERE `id_pr`=".$id);
    $conn->close();
  }
  public function AjouterPointsrelais($nom,$vill,$ver,$hor){
    $conn = $GLOBALS['conn'];
    $conn->query("INSERT INTO `points_relais`(`lib_pr`, `id_ville`, `loc_ver`, `loc_hor`) VALUES ('$nom',$vill,'$ver','$hor')");
    $conn->close();
  }
  public function ModifierPointsrelais($id,$nom,$vill,$ver,$hor){
    $conn = $GLOBALS['conn'];
    $conn->query("UPDATE `points_relais` SET `lib_pr`='$nom',`id_ville`=$vill,`loc_ver`='$ver',`loc_hor`='$hor' WHERE `id_pr`=".$id);
    $conn->close();
  }
}

 ?>
