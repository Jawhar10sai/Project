<?php
require_once("conftaxDB.php");
class Villes
{

  function __construct()
  {
    // code...
  }

public function listeVille(){
  $conn = $GLOBALS['conn'];
  $villes = $conn->query("SELECT * FROM `ville` WHERE `VILLE_TYP`=1 ORDER BY `VILLE_LIB`");
  return $villes;
  $conn->close();
}

public function VilleID($idcli){
  $conn = $GLOBALS['conn'];
  if(!empty($idcli)){
    $clis = $conn->query("SELECT * FROM `ville` WHERE `VILLE_LIB` LIKE '%$idcli%' LIMIT 1");
    $nbrclis = $clis->num_rows;
    if ($nbrclis>0) {
      foreach ($clis as $cli) {
        return $cli['VILLE_COD'];
      }
    }
  }
else
  return 0;
  $conn->close();
}

/*ville à partir de son code*/
public function IDVille($idcli){
  $conn = $GLOBALS['conn'];
  if(!empty($idcli)){
    $clis = $conn->query("SELECT * FROM `ville` WHERE `VILLE_COD`=".$idcli);
    $nbrclis = $clis->num_rows;
    if ($nbrclis>0) {
      foreach ($clis as $cli) {
        return $cli['VILLE_LIB'];
      }
    }
  }
  $conn->close();
}


public function supprimerVille($id){
  $conn = $GLOBALS['conn'];
  $conn->query("DELETE FROM `ville` WHERE `VILLE_COD`=".$id);
  $conn->close();
}


public function ajouterVille($codvil,$AGENCE_COD,$VILLE_LIB,$VILLE_TYP,$DELAI,$ZONE_COD){
  $conn = $GLOBALS['conn'];
  $conn->query("INSERT INTO `ville`(`VILLE_COD`,`AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`) VALUES ($codvil,'$AGENCE_COD','$VILLE_LIB','$VILLE_TYP',$DELAI,'$ZONE_COD')");
  $conn->close();
}

public function ModifierVille($id,$AGENCE_COD,$VILLE_LIB,$VILLE_TYP,$DELAI,$ZONE_COD)
{
  $conn = $GLOBALS['conn'];
  $conn->query("UPDATE `ville` SET `AGENCE_COD`='$AGENCE_COD',`VILLE_LIB`='$VILLE_LIB',`VILLE_TYP`='$VILLE_TYP',`DELAI`=$DELAI,`ZONE_COD`='$ZONE_COD' WHERE `VILLE_COD`=".$id);
  $conn->close();
}
public function derniereville(){
  $conn = $GLOBALS['conn'];
  $dercs = $conn->query("SELECT * FROM `ville` ORDER BY `VILLE_COD` DESC LIMIT 1");
  foreach ($dercs as $derc) {
    $cliid = $derc['VILLE_COD'];
  }
  return $cliid+=1;
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

public function Apointsrelais($ville){
  $conn = $GLOBALS['conn'];
  $listepe = $conn->query("SELECT * FROM `points_relais` WHERE `id_ville`=".$ville);
  if ($listepe->num_rows>0)
      return "a point relai";
    else
      return "pas de PR";
  $conn->close();
}

public function Aagence($ville){
  $conn = $GLOBALS['conn'];
  $listepe = $conn->query("SELECT * FROM `agence` WHERE `AGENCE_COD`=".$ville);
  if ($listepe->num_rows>0)
      return "a agence";
    else
      return "pas d'agence";
  $conn->close();
}
public function LIBAagence($ville){
  $conn = $GLOBALS['conn'];
  if (!empty($ville)) {
    $listepe = $conn->query("SELECT * FROM `agence` WHERE `AGENCE_COD`=".$ville);
    if ($listepe) {
      if ($listepe->num_rows>0) {
        foreach ($listepe as $cli) {
          return $cli['AGENCE_LIB'];
      }
      }else
      return "";
    }else
    return "";
  }else {
    return "--";
  }

  $conn->close();
}

public function AgenceVille($idcli){
  $conn = $GLOBALS['conn'];
  if(!empty($idcli)){
    $clis = $conn->query("SELECT * FROM `ville` WHERE `VILLE_COD`=".$idcli);
    $nbrclis = $clis->num_rows;
    if ($nbrclis>0) {
      foreach ($clis as $cli) {
        return $cli['AGENCE_COD'];
      }
    }
  }
  $conn->close();
}











}
?>
