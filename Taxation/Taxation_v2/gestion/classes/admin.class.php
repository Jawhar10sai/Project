<?php
include_once "conftaxDB.php";
/**
 *
 */
class Admins
{
  public $id;
  public $nom;
  public $prenom;
  public $username;
  public $mailadmin;
  public $mot_de_passe;
  protected $connection;
  function __construct()
  {
    $this->id = "";
    $this->nom = "";
    $this->prenom = "";
    $this->username = "";
    $this->mailadmin = "";
    $this->mot_de_passe = "";
    $this->connection = $GLOBALS['conn'];
  }
  public function TrouverAdmin($id){
    $result = $this->connection->query("SELECT * FROM `admin` WHERE `id_admin`=$id");
    if ($result) {
      if ($result->num_rows>0) {
        foreach ($result as $admin) {
          $this->id = $admin['id_admin'];
          #$this->nom = $admin[''];
          #$this->prenom = $admin[''];
          $this->username = $admin['adminname'];
          $this->mot_de_passe = $admin['password'];
          $this->mailadmin = $admin['mailadmin'];
        }
        return true;
      }else {
        return false;
      }
    }else {
      return false;
    }
  }
  public function AjouterAdmin(){
    $this->connection->query("INSERT INTO `admin`(`id_admin`, `adminname`, `password`, `mailadmin`) VALUES ($this->id,'$this->username','$this->mot_de_passe','$this->mailadmin')");
  }
  public function ModifierAdmin(){
    $this->connection->query("UPDATE `admin` SET `adminname`='$this->username',`password`='$this->mot_de_passe',`mailadmin`='$this->mailadmin' WHERE `id_admin`=$this->id");
  }
  public function SupprimerAdmin(){
    $this->connection->query("DELETE FROM `admin` WHERE `id_admin`=$this->id");
  }
  public function ListeAdmins(){
    return $this->connection->query("SELECT * FROM `admin`");
  }


}
 ?>
