<?php
require_once("conftaxDB.php");

/**
 *
 */
class Adresses
{
  public $id;
  public $adresse;
  public $id_client;
  public $id_user;
  public $id_ville;
  protected $connection;
  function __construct()
  {
    $this->id ="";
    $this->adresse ="";
    $this->id_client ="";
    $this->id_user ="";
    $this->id_ville ="";
    $this->connection = $GLOBALS['conn'];
  }

    public function listeAdresse(){
      return $this->connection->query("SELECT * FROM `adresses`");
    }
    public function TrouverAdresse($id){
      $adresses = $this->connection->query("SELECT * FROM `adresses` WHERE `id_adresse`=$id");
      if ($adresses->num_rows>0) {
        foreach ($adresses as $adresse) {
          $this->id =$adresse['id_adresse'];
          $this->adresse =$adresse['lib_adresse'];
          $this->id_client =$adresse['id_client'];
          $this->id_user =$adresse['id_user'];
          $this->id_ville =$adresse['id_ville'];
        }
        return true;
      }else {
        return false;
      }
    }
    public function AjouterAdresse(){
      $this->connection->query("INSERT INTO `adresses`(`lib_adresse`, `id_client`, `id_user`,`id_ville`) VALUES('$this->adresse',$this->id_client,$this->id_user,$this->id_ville)");
      //get the last id
      return $this->connection->insert_id;
    }
    public function ModifierAdresse($par){
      $this->connection->query("UPDATE `adresses` SET `lib_adresse`='$this->adresse',`modifie_le`=now(),`commit_par`='$par',`id_client`=$this->id_client,`id_user`=$this->id_user,`id_ville`=$this->id_ville WHERE `id_adresse`=$this->id");
    }
    public function SupprimerAdresse($par){
      $this->connection->query("UPDATE `adresses` SET `supprime_le`=now(),`commit_par`='$par', WHERE `id_adresse`=$this->id");
    }
    /* Verification de l'adresse si c'est l'actuelle ou bien une nouvelle*/
    public function AdresseExiste(){
      $select1 =$this->connection->query("SELECT * FROM `adresses` WHERE `id_client`=$this->id_client AND `lib_adresse`='$this->adresse' AND `supprime_le`IS NULL LIMIT 1");
      if (!$select1) {
        return false;
      }else {
          foreach ($select1 as $adresse) {
            $this->TrouverAdresse($adresse['id_adresse']);
            return $this->id;
          }
        }
      }
}
?>
