<?php
/**
 *
 */
 require_once("conftaxDB.php");
class Agence
{
  public $AGENCE_COD;
  public $AGENCE_LIB;
  public $AGENCE_ADRESSE;
  public $AGENCE_TEL;
  protected $connection;
  function __construct()
  {
    $this->AGENCE_COD ="";
    $this->AGENCE_LIB ="";
    $this->AGENCE_ADRESSE ="";
    $this->AGENCE_TEL ="";
    $this->connection =$GLOBALS['conn'];
  }

  public function AjouterAgence(){
    $this->connection->query("INSERT INTO `agence`(`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`) VALUES ('$this->AGENCE_COD','$this->AGENCE_LIB','$this->AGENCE_ADRESSE','$this->AGENCE_TEL')");
  }

 public function ListeAgences(){
     return $this->connection->query("SELECT * FROM `agence` AND `supprime_le`IS NULL");
 }


}
 ?>
