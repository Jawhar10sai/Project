<?php
include_once "conftaxDB.php";
/**
 *
 */
class Utilisateurs
{
  public $id;
  public $username;
  public $mot_de_passe;
  public $identite;
  protected $connection;
  function __construct()
  {
    $this->id = "";
    $this->username = "";
    $this->mot_de_passe = "";
    $this->identite = "";
    //Connection::getConnection() = $GLOBALS['conn'];
  }
  public static function VerifierCompte($login, $mot_de_passe)
  {
    $admin = Connection::getConnection()->prepare("SELECT * FROM `admin` WHERE `adminname`=? AND `password`=?");
    $client = Connection::getConnection()->prepare("SELECT * FROM `client_lve` WHERE `login`=? AND `mot_de_passe`=? AND `supprime_le` IS NULL");
    $session = Connection::getConnection()->prepare("SELECT * FROM `client_lve_session` WHERE `LOGIN`=? AND `MOT_D_PASS`=? AND `supprime_le` IS NULL");
    if ($admin->execute([$login, $mot_de_passe])) {
      $result = $admin->fetchObject();
      return 'est admin';
    } elseif ($client->execute([$login, $mot_de_passe])) {
      $result = $client->fetchObject();
      return 'est admin';
    } elseif ($session->execute([$login, $mot_de_passe])) {
      $result = $session->fetchObject();
      return 'est admin';
    } else
      return false;
  }

  public function est_admin()
  {
    $result = Connection::getConnection()
      ->query("SELECT * FROM `admin` WHERE `adminname`='$this->username' AND `password`='$this->mot_de_passe'");
    if ($result) {
      if ($result->num_rows > 0) {
        foreach ($result as $admin) {
          $this->id = $admin['id_admin'];
          $this->username = $admin['adminname'];
          $this->mot_de_passe = $admin['password'];
        }
        return true;
      } else
        return false;
    } else {
      return false;
    }
  }
  public function est_client()
  {
    $result = Connection::getConnection()
      ->query("SELECT * FROM `client_lve` WHERE `login`='$this->username' AND `mot_de_passe`='$this->mot_de_passe' AND `supprime_le`IS NULL");
    if ($result) {
      if ($result->num_rows > 0) {
        foreach ($result as $client) {
          $this->id = $client['CLIENT_ID'];
          $this->username = $client['login'];
          $this->mot_de_passe = $client['mot_de_passe'];
          $this->identite = $client['IDENTITE_TYP'];
        }
        return true;
      } else
        return false;
    } else {
      return false;
    }
  }
  public function est_session()
  {
    $result = Connection::getConnection()
      ->query("SELECT * FROM `client_lve_session` WHERE `LOGIN`='$this->username' AND `MOT_D_PASS`='$this->mot_de_passe' AND `supprime_le`IS NULL");
    if ($result) {
      if ($result->num_rows > 0) {
        foreach ($result as $session) {
          $this->id = $session['AGENCE_COD'];
          $this->username = $session['LOGIN'];
          $this->mot_de_passe = $session['MOT_D_PASS'];
          $this->identite = $session['IDENTITE_TYP'];
        }
        return true;
      } else
        return false;
    } else {
      return false;
    }
  }
}
