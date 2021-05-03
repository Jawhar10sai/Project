<?php
class Adresses
{
  public $id_adresse, $lib_adresse, $id_client, $id_user, $id_ville, $modifie_le, $supprime_le, $commit_par;
  function __construct()
  {
    $this->id_adresse = "";
    $this->lib_adresse = "";
    $this->id_client = "";
    $this->id_user = "";
    $this->id_ville = "";
    $this->modifie_le = NULL;
    $this->supprime_le = NULL;
    $this->commit_par = NULL;
  }
  public static function listeAdresse()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `adresses` where `supprime_le` IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }

  public static function TrouverAdresse($id)
  {
    $adresse = Connection::getConnection()->query("SELECT * FROM `adresses` WHERE `id_adresse`=$id");
    if ($adresse) {
      $adresse->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $adresse->fetch();
    } else
      return false;
  }
  public function AjouterAdresse()
  {
    $con = Connection::getConnection();
    $liste_data = array(
      ':lib_adresse'    =>  $this->lib_adresse,
      ':id_client'    =>  $this->id_client,
      ':id_user'    =>  $this->id_user,
      ':id_ville'    =>  $this->id_ville,
      ':commit_par'    =>  $this->commit_par
    );
    $stm = $con->prepare("INSERT INTO `adresses`(`lib_adresse`, `id_client`, `id_user`,`id_ville`,`commit_par`) VALUES (:lib_adresse, :id_client, :id_user,:id_ville,:commit_par)");

    if ($stm->execute($liste_data))
      return  $con->lastInsertId();
    else
      return false;
  }
  public function ModifierAdresse()
  {

    $liste_data = array(
      ':id'    =>  $this->id_adresse,
      ':adresse'    =>  $this->lib_adresse,
      ':id_client'    =>  $this->id_client,
      ':id_user'    =>  $this->id_user,
      ':id_ville'    =>  $this->id_ville,
      ':commit_par'    =>  $this->commit_par
    );
    $stmt = Connection::getConnection()->prepare("UPDATE `adresses` SET `lib_adresse`=:adresse,`modifie_le`=now(),`commit_par`=:commit_par,`id_client`=:id_client,`id_user`=:id_user,`id_ville`=:id_ville WHERE `id_adresse`=:id");
    if ($stmt->execute($liste_data))
      return $this->id;
    else
      false;
  }
  public function SupprimerAdresse()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `adresses` SET `supprime_le`=now(),`commit_par`=:commit_par, WHERE `id_adresse`=:id");
    if ($stmt->execute(array(':id' => $this->id_adresse, ':commit_par' => $this->commit_par)))
      return true;
    else
      return false;
  }
  /* Verification de l'adresse si c'est l'actuelle ou bien une nouvelle*/
  public static function AdresseExiste($id_client, $adresse)
  {
    $select1 = Connection::getConnection()
      ->prepare("SELECT * FROM `adresses` WHERE `id_client`=:id AND `lib_adresse`=:adresse AND `supprime_le` IS NULL LIMIT 1");
    if ($select1->execute(array(':id' => $id_client, ':adresse' => $adresse))) {
      $select1->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $select1->fetch();
    } else
      return false;
  }
  public static function AdresseClient($client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `adresses` WHERE `id_client`=? ORDER BY `id_adresse` DESC LIMIT 1");
    if ($result->execute([$client])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return
        false;
  }
}
