<?php
require_once "conftaxDB.php";
class Reclamations
{
  public $id;
  public $numero;
  public $client;
  public $dateReclamation;
  public $telFix;
  public $user;
  public $telGSM;
  public $typeutil;
  public $recTypeObjet;
  public $recObjet;
  protected $connection;

  function __construct()
  {
    $this->id = "";
    $this->numero = "";
    $this->client = "";
    $this->dateReclamation = date('Y-m-d');
    $this->user = "";
    $this->telGSM = "";
    $this->telFix = "";
    $this->typeutil = "expediteur";
    $this->recTypeObjet = "";
    $this->recObjet = "";
    $this->connection = $GLOBALS['conn'];
  }

  public function ListeReclamations(){
    return $this->connection->query("SELECT * FROM `reclamation` WHERE `supprime_le`IS NULL");
  }

  public function AjouterReclamation(){
    $this->connection->query("INSERT INTO `reclamation`(`date_reclamation`, `client`, `num_declar`, `objet_reclamation`, `id_user`, `type_utilisateur`, `tpy_reclam`) VALUES (now(),'$this->client','$this->numero','$this->recObjet',$this->user,'$this->typeutil','$this->recTypeObjet')");
  }
  public function TrouverReclamation($id){
    $reclams = $this->connection->query("SELECT * FROM `reclamation` WHERE `id_reclamation`=$this->id AND `supprime_le`IS NULL");
    if ($reclams) {
      if ($reclams->num_row>0) {
        foreach ($reclams as $reclam) {
          $this->id = $reclam['id_reclamation'];
          $this->numero = $reclam['num_declar'];
          $this->client = $reclam['idclient'];
          $this->dateReclamation = $reclam['date_reclamation'];
          $this->recObjet = $reclam['objet_reclamation'];
          $this->user = $reclam['id_user'];
          $this->typeutil = $reclam['type_utilisateur'];
          $this->recTypeObjet = $reclam['tpy_reclam'];
          #$this->telGSM = "";
          #$this->telFix = "";
        }
        return true;
      }else
        return false;
    }else
      return false;
  }
  public function ModifierReclamation($par){
    $this->connection->query("UPDATE `reclamation` SET `date_reclamation`='$this->dateReclamation',`client`='$this->client',`num_declar`='$this->numero',`objet_reclamation`='$this->recObjet',`id_user`=$this->user,`type_utilisateur`='$this->typeutil',`tpy_reclam`='$this->recTypeObjet',`modifie_le`=now(),`commit_par`='$par' WHERE `id_reclamation`=$this->id");
  }
  public function SupprimerReclamation($par){
    $this->connection->query("UPDATE `reclamation` SET `supprime_le`=now(),`commit_par`='$par' WHERE `id_reclamation`=$this->id");
  }
}
 ?>
