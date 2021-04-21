<?php
include_once "conftaxDB.php";
/**
 *
 */
class ClientSession
{
  public $AGENCE_COD;
  public $AGENCE_LIB;
  public $REFERENCIEE;
  public $LOGIN;
  public $MOT_D_PASS;
  public $IDENTITE_TYP;
  protected $connection;
  function __construct()
  {
    $this->AGENCE_COD = "";
    $this->AGENCE_LIB = "";
    $this->REFERENCIEE = "";
    $this->LOGIN = "";
    $this->MOT_D_PASS = "12345678";
    $this->IDENTITE_TYP = "de";
    $this->connection = $GLOBALS['conn'];
  }
public function TrouverSession($id){
  $result = $this->connection->query("SELECT * FROM `client_lve_session` WHERE `AGENCE_COD`='$id'");
  if ($result) {
    if ($result->num_rows>0) {
      foreach ($result as $clientsession) {
        $this->AGENCE_COD = $clientsession['AGENCE_COD'];
        $this->AGENCE_LIB = $clientsession['AGENCE_LIB'];
        $this->REFERENCIEE = $clientsession['REFERENCIEE'];
        $this->LOGIN = $clientsession['LOGIN'];
        $this->MOT_D_PASS = $clientsession['MOT_D_PASS'];
        $this->IDENTITE_TYP = $clientsession['IDENTITE_TYP'];
      }
      return true;
    }else {
      return false;
    }
  }else {
    return false;
  }
}
public function AjouterSession(){
    $res = $this->connection->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=$this->REFERENCIEE");
    $nbrcl = $res->num_rows;
    foreach ($res as $key) {
      if ($key['intervalag_deb']<$key['intervalag_fin']) {
        $interval = $key['intervalag_deb']+1;
        $this->AGENCE_COD = $key['NOM']."-".(string)$interval;
        $this->LOGIN = $this->AGENCE_COD;
        $this->MOT_D_PASS = sha1($this->MOT_D_PASS);
        $this->connection->query("INSERT INTO `client_lve_session`(`AGENCE_COD`, `AGENCE_LIB`, `REFERENCIEE`, `LOGIN`, `MOT_D_PASS`,`IDENTITE_TYP`) VALUES ('$this->AGENCE_COD','$this->AGENCE_LIB',$this->REFERENCIEE,'$this->LOGIN','$this->MOT_D_PASS','$this->IDENTITE_TYP')");
        $this->connection->query("UPDATE `client_lve` SET `intervalag_deb`=$interval WHERE `CLIENT_ID`=$this->REFERENCIEE");
      }
    }
  }
  public function ModifierSession($par){
    #$this->MOT_D_PASS = sha1($this->MOT_D_PASS );
    $this->connection->query("UPDATE `client_lve_session` SET  `AGENCE_LIB`='$this->AGENCE_LIB',`modifie_le`=now(),`commit_par`='$par',`REFERENCIEE`=$this->REFERENCIEE,`LOGIN`='$this->LOGIN',`MOT_D_PASS`='$this->MOT_D_PASS',`IDENTITE_TYP`='$this->IDENTITE_TYP' WHERE `AGENCE_COD`='$this->AGENCE_COD'");
  }
  public function SupprimerSession($par){
    $this->connection->query("UPDATE `client_lve_session` SET `supprime_le`=now(),`commit_par`='$par' WHERE `AGENCE_COD`='$this->AGENCE_COD'");
    $this->connection->query("UPDATE `client_lve` SET `intervalag_fin`=`intervalag_fin`+1 WHERE `CLIENT_ID`=$this->REFERENCIEE");
  }
  public function ConnecterSession(){
    $this->connection->query("UPDATE `client_lve_session` SET `IDENTITE_TYP`='co'  WHERE `AGENCE_COD`='$this->AGENCE_COD'");
  }
  public function deconnecterSession(){
    $this->connection->query("UPDATE `client_lve_session` SET `IDENTITE_TYP`='de'  WHERE `AGENCE_COD`='$this->AGENCE_COD'");
  }

}

 ?>
