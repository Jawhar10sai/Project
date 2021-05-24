<?php

/**
 *
 */
class Connexion
{
  public $id;
  public $id_utilisateur;
  public $type_utilisateur;
  public $date_connexion;
  public $date_deconnexion;
  function __construct()
  {
    $this->id = "";
    $this->id_utilisateur = "";
    $this->type_utilisateur = "client";
    $this->date_connexion = "";
    $this->date_deconnexion = "";
  }
  public static function TrouverConnexion($id)
  {
    $cons = Connection::getConnection()->prepare("SELECT * from `connexion` where id=?");
    if ($cons->execute([$id])) {
      $cons->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $cons->fetch();
    } else
      return false;
  }
  public static function ListeConnexion()
  {
    return Connection::getConnection()
      ->query("SELECT * from `connexion`")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  public function Connecter()
  {
    $con = Connection::getConnection();
    $stmt = $con->prepare("INSERT INTO `connexion`(`id_utilisateur`,`type_utilisateur`) VALUES (?,?)");
    return (!$stmt->execute([$this->id_utilisateur, $this->type_utilisateur])) ? false :  $con->lastInsertId();
  }
  public function Deconnecter()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `connexion` SET `date_deconnexion`=now() WHERE `id`=?");
    return (!$stmt->execute([$this->id])) ? false : true;
  }

  public static function ConnexionUtilisateurs($utilisateur)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `connexion` WHERE `id_utilisateur`=?");
    return ($result->execute([$utilisateur])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
  }
}
