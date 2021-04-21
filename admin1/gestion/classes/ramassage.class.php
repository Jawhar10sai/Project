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
}

 ?>
