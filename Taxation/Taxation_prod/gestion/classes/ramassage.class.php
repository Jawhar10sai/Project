<?php
#Gestion de ramassage
include_once "conftaxDB.php";
/**
 *
 */
class Ramassage
{
  public $numero_carnet;
  public $code_ramassage;
  public $num_declaration;
  public $num_client;
  public $date_saisie_ramassage;
  public $date_ramassage;
  public $etat_carnet;
  public $motif_annulation;
  protected $connection;
  function __construct()
  {
    $this->numero_carnet = "";
    $this->code_ramassage = "";
    $this->num_declaration = "";
    $this->num_client = "";
    $this->date_saisie_ramassage = "";
    $this->date_ramassage = "";
    $this->etat_carnet = "";
    $this->motif_annulation = "";
    $this->connection = $GLOBALS['conn'];
  }
/*
  if ($client_lve->carnetEncours()==='nouv') {
    $createcarnet = "INSERT INTO `ramasse`(`dateramassage`, `user_id`,`code_ramassage`) VALUES ('$dateram',$iduser,'$rand')";
    $conn->query($createcarnet);
        $lasts= $conn->query("SELECT * from `ramasse` ORDER BY `numeroCarnet` desc LIMIT 1");
        foreach ($lasts as $value) {
          $last_id = $value['numeroCarnet'];
          }
  }else {
    $last_id = $client_lve->carnetEncours();
  }
      foreach ($nums as $key) {
        $conn->query("INSERT INTO `panierramasse`(`numeroCarnet`,`declaration`) VALUES ($last_id,'$key')");
      }








}

 ?>
