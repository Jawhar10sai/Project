<?php
require_once("conftaxDB.php");
class Villes
{
  public $VILLE_COD;
  public $AGENCE_COD;
  public $VILLE_LIB;
  public $VILLE_TYP;
  public $DELAI;
  public $ZONE_COD;
  protected $connection;

  function __construct()
  {
    $this->VILLE_COD ="";
    $this->AGENCE_COD ="";
    $this->VILLE_LIB ="";
    $this->VILLE_TYP ="";
    $this->DELAI ="";
    $this->ZONE_COD ="";
    $this->connection = $GLOBALS['conn'];
  }

public function TrouverVille($code){
  $result = $this->connection->query("SELECT * FROM `ville` WHERE `VILLE_COD`=$code");
  if ($result) {
    if ($result->num_rows>0) {
      foreach ($result as $ville) {
        $this->VILLE_COD = $ville['VILLE_COD'];
        $this->AGENCE_COD = $ville['AGENCE_COD'];
        $this->VILLE_LIB = $ville['VILLE_LIB'];
        $this->VILLE_TYP = $ville['VILLE_TYP'];
        $this->DELAI = $ville['DELAI'];
        $this->ZONE_COD = $ville['ZONE_COD'];
      }
      return true;
    }else {
      return false;
    }
  }else {
    return false;
  }
}
public function ListeVilles(){
  return $this->connection->query("SELECT * FROM `ville` WHERE `VILLE_TYP`=1 ORDER BY `VILLE_LIB` AND `supprime_le`IS NULL");
}
public function AjouterVille(){
  $this->connection->query("INSERT INTO `ville`(`VILLE_COD`,`AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`) VALUES ($this->VILLE_COD,'$this->AGENCE_COD','$this->VILLE_LIB','$this->VILLE_TYP',$this->DELAI,'$this->ZONE_COD')");
}
public function ModifierVille($par){
  $this->connection->query("UPDATE `ville` SET `AGENCE_COD`='$this->AGENCE_COD',`VILLE_LIB`='$this->VILLE_LIB',`VILLE_TYP`='$this->VILLE_TYP',`DELAI`=$this->DELAI,`ZONE_COD`='$this->ZONE_COD',`modifie_le`=now(),`commit_par`='$par' WHERE `VILLE_COD`=$this->VILLE_COD ");
}
public function SupprimerVille(){
  $this->connection->query("UPDATE `ville` AND `supprime_le`=now() WHERE `VILLE_COD`=$this->VILLE_COD");
}
public function Aagence(){
  $result = $this->connection->query("SELECT * FROM `agence` WHERE `AGENCE_COD`=$this->VILLE_COD AND `supprime_le`IS NULL");
  if ($result->num_rows>0)
      return true;
    else
      return false;
}
public function Apointsrelais(){
  $result = $this->connection->query("SELECT * FROM `points_relais` WHERE `id_ville`=$this->VILLE_COD AND `supprime_le`IS NULL");
  if ($result->num_rows>0)
      return true;
    else
      return false;
}
public function VilleLib($ville_lib){
  if(!empty($ville_lib)){
    $result = $this->connection->query("SELECT * FROM `ville` WHERE `VILLE_LIB` LIKE '%$ville_lib%' AND `supprime_le`IS NULL LIMIT 1");
    if ($result->num_rows>0) {
      foreach ($result as $cli) {
         $this->TrouverVille($cli['VILLE_COD']);
      }
      return true;
    }else
      return 0;
  }else
  return 0;
}
public function DerniereVille(){
  $result = $this->connection->query("SELECT * FROM `ville` WHERE `supprime_le`=NULL ORDER BY `VILLE_COD` DESC LIMIT 1");
  foreach ($result as $derc) {
    $this->TrouverVille($derc['VILLE_COD']);
  }
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
