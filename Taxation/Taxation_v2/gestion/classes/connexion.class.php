<?php
include_once "conftaxDB.php";
/**
 *
 */
class Connexion
{
  public $id;
  public $id_utilisateur;
  public $date_connexion;
  public $date_deconnexion;
  protected $connection;
  function __construct()
  {
    $this->id = "";
    $this->id_utilisateur = "";
    $this->date_connexion = "";
    $this->date_deconnexion = "";
    $this->connection = $GLOBALS['conn'];
  }
  public function TrouverConnexion($id){
    $cons = $this->connection->query("SELECT * from `connexion` where id=$id");
    if ($cons) {
      foreach ($cons as $con) {
        $this->id = $con['id'];
        $this->id_utilisateur = $con['id_utilisateur'];
        $this->date_connexion = $con['date_connexion'];
        $this->date_deconnexion = $con['date_deconnexion'];
      }
    }else
      return false;
  }
  public function ListeConnexion(){
    return $this->connection->query("SELECT * from `connexion`");
  }
  public function Connecter(){
    $this->connection->query("INSERT INTO `connexion`(`id_utilisateur`) VALUES ($this->id_utilisateur)");
    return $this->connection->insert_id;
  }
  public function Deconnecter(){
    $this->connection->query("UPDATE `connexion` SET `date_deconnexion`=now() WHERE `id`=$this->id");
  }

}
 ?>
