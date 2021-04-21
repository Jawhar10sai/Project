<?php
class Admins
{
  public $id;
  public $login;
  public $mot_de_passe;
  public $nom;
  public $prenom;
  function __construct()
  {
  }
  public function liste_admins()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `admins`")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  public function Trouver_admins($id)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `admins` WHERE `id_admin`=?");
    if ($result->execute([$id])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public function Connexion_admins()
  {
    $result = $this->connection->query("SELECT * FROM `admins` WHERE `pseudo`='$this->login' AND `mot_de_passe`='$this->mot_de_passe'");
    if ($result) {
      if ($result->num_rows > 0) {
        return true;
      } else
        return false;
    } else
      return false;
  }
  public function get_ID()
  {
    $result = $this->connection->query("SELECT * FROM `admins` WHERE `pseudo`='$this->login' AND `mot_de_passe`='$this->mot_de_passe'");
    foreach ($result as $admin) {
      return $admin['id_admin'];
    }
  }
}
