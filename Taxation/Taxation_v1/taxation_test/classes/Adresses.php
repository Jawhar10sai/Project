<?php
require_once("conftaxDB.php");

/**
 *
 */
class Adresses
{

  function __construct()
  {
    // code...
  }

    public function listeAdresse(){
      $conn = $GLOBALS['conn'];
      $adrese = $conn->query("SELECT * FROM `adresses`");
      return $adrese;
    }
	/* Verification de l'adresse si c'est l'actuelle ou bien une nouvelle*/
  public function verifieradresse($numero,$adresse,$idus,$ville){
    $conn = $GLOBALS['conn'];
    $select1 = $conn->query("SELECT * FROM `adresses` WHERE `id_client`=".$numero." AND `lib_adresse`='$adresse' LIMIT 1");
    $ncount=$select1->num_rows;
    if ($ncount===0) {
      $conn->query("INSERT INTO `adresses`(`lib_adresse`, `id_client`, `id_user`,`id_ville`) VALUES('$adresse',$numero,$idus,$ville)");
      $affected = $conn -> affected_rows;
      if ($affected == 1) {
        $select2 = $conn->query("SELECT * FROM `adresses` WHERE `id_client`=".$numero." ORDER BY `id_adresse` DESC LIMIT 1");
        foreach ($select2 as $selet2) {
          return $selet2['id_adresse'];
          break;
        }
      }

    }else {
      foreach ($select1 as $selet1) {
        return $selet1['id_adresse'];
        break;
      }
    }
  }


public function derniereadresseClient($idcli){
  $conn = $GLOBALS['conn'];
  $dercs = $conn->query("SELECT * FROM `vAdressess` WHERE `CLIENT_COD`='$idcli' ORDER BY id_adresse DESC LIMIT 1");
  return $dercs;
}

public function AjouterAdresse($numero,$adresse,$idus,$ville){
  $conn = $GLOBALS['conn'];
  $conn->query("INSERT INTO `adresses`(`lib_adresse`, `id_client`, `id_user`,`id_ville`) VALUES('$adresse',$numero,$idus,$ville)");
  $conn->close();
}
/* les adresses d'une ville donnée*/
public function AdresseVille($idvil){
  $conn = $GLOBALS['conn'];
  $dercs = $conn->query("SELECT * FROM `adresses` WHERE `id_ville`=".$idvil);
  if ($dercs->num_rows>0) {
    foreach ($dercs as $derc) {
      return $derc['id_adresse'];
    }
  }else{
    return 0;
  }
}

public function IDAdresse($idadr){
  $conn = $GLOBALS['conn'];
  $dercs = $conn->query("SELECT * FROM `adresses` WHERE `id_adresse`=".$idadr);
  if ($dercs->num_rows>0) {
    foreach ($dercs as $derc) {
      return $derc['lib_adresse'];
    }
  }
}

/* La ville d'une adresse donnée*/
public function VilleAdresse($idadr){
  $conn = $GLOBALS['conn'];
  $dercs = $conn->query("SELECT * FROM `adresses` WHERE `id_adresse`=".$idadr);
  if ($dercs->num_rows>0) {
    foreach ($dercs as $derc) {
      return $derc['id_ville'];
    }
  }
}

public function SupprimerAdresse($id){
  $conn = $GLOBALS['conn'];
  $result = $conn->query("DELETE FROM `adresses` WHERE `id_adresse`=".$id);
  if ($result->num_rows<=0) {
    echo "<script>alert('Impossible de supprimer');</script>";
  }
  $conn->close();
}

public function ModifierAdresse($idad,$numero,$adresse,$idus,$ville){
  $conn = $GLOBALS['conn'];
  $conn->query("UPDATE `adresses` SET `lib_adresse`='$adresse',`id_client`=$numero,`id_user`=$idus,`id_ville`=$ville WHERE `id_adresse`=".$idad);
  $conn->close();
}


}
?>
