<?php

/**
 *
 */
class Admins
{
  public $id, $username, $mot_de_passe, $mailadmin;
  protected $liste_data;
  function __construct()
  {
    $this->id_admin = null;
    $this->username = "";
    $this->mot_de_passe = "";
    $this->mailadmin = "";
  }

  private function ActualiserListe()
  {
    $this->liste_data = array(
      ':id'    =>  $this->id_admin,
      ':nom'    =>  $this->username,
      ':pass'    =>  $this->mot_de_passe,
      ':mail'    =>  $this->mailadmin
    );
  }

  public static function VerifierCompte($login, $mot_de_passe)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `admin` WHERE `adminname`=? AND `password`=?");
    if ($result->execute([$login, $mot_de_passe])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function TrouverAdmin($id)
  {
    $result = Connection::getConnection()->query("SELECT * FROM `admin` WHERE `id_admin`=$id");
    if ($result) {
      return $result->fetchObject(__CLASS__);
    } else {
      return false;
    }
  }
  public static function ListeAdmins()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `admin`")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  private function AjouterAdmin()
  {
    $this->liste_data = array(
      ':nom'    =>  $this->username,
      ':pass'    =>  $this->mot_de_passe,
      ':mail'    =>  $this->mailadmin
    );
    $statement = Connection::getConnection()->prepare("INSERT INTO `admin`( `adminname`, `password`, `mailadmin`) VALUES (:nom, :pass, :mail)");
    if ($statement->execute($this->liste_data))
      return Connection::getConnection()->lastInsertId();
  }
  private function ModifierAdmin()
  {
    $this->ActualiserListe();
    $statement = Connection::getConnection()->prepare("UPDATE `admin` SET `adminname`=:nom,`password`=:pass,`mailadmin`=:mail WHERE `id_admin`=:id");
    if ($statement->execute($this->liste_data))
      return Connection::getConnection()->lastInsertId();
  }
  public function Enregistrer()
  {
    if ($this->id == null)
      $this->AjouterAdmin();
    else
      $this->ModifierAdmin();
  }

  public function SupprimerAdmin()
  {
    Connection::getConnection()->query("DELETE FROM `admin` WHERE `id_admin`=$this->id");
  }
}
