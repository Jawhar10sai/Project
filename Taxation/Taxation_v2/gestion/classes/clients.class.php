<?php
require_once("conftaxDB.php");
/**
 *
 */
class Clients
{
    public $CLIENT_ID;
    public $CLIENT_COD;
    public $NOM;
    public $PRENOM;
    public $CIVILITE_COD;
    public $CLIENT_TYP;
    public $IDENTITE_TYP;
    public $IDENTITE_VAL;
    public $ID_FISCALE;
    public $CAPITAL_SOC;
    public $CREATION_DAT;
    public $CLIENT_ETA;
    public $MOTIF_ETA;
    public $SECTEUR_COD;
    public $EMPLOYE_ID;
    public $SAISIE_DAT;
    public $AGENCE_COD;
    public $commentaire;
    public $mail;
    public $ICE;
    public $telephone;
    public $connection;

    function __construct()
    {
      $this->CLIENT_ID = "";
      $this->CLIENT_COD = "";
      $this->NOM = "";
      $this->PRENOM = "";
      $this->CIVILITE_COD = "";
      $this->CLIENT_TYP = "";
      $this->IDENTITE_TYP = "de";
      $this->IDENTITE_VAL = "";
      $this->ID_FISCALE = "";
      $this->CAPITAL_SOC = 0;
      $this->CREATION_DAT = date('Y-m-d');
      $this->CLIENT_ETA = "";
      $this->MOTIF_ETA = 0;
      $this->SECTEUR_COD = "";
      $this->EMPLOYE_ID = 0;
      $this->SAISIE_DAT = date('Y-m-d');
      $this->AGENCE_COD = "";
      $this->commentaire = "";
      $this->mail = "";
      $this->ICE = "";
      $this->telephone = "";
      $this->connection = $GLOBALS['conn'];
    }
    public function ListeClients(){
      if (get_class($this)=='ClientLve')
          return $this->connection->query("SELECT * FROM `client_lve` WHERE `supprime_le`IS NULL");
        else
        return $this->connection->query("SELECT * FROM `client` WHERE `supprime_le`IS NULL");
    }

    public function MesDeclaration(){
      if (get_class($this)=='ClientLve') {
        return $this->connection->query("SELECT * FROM `declaration_v` WHERE `client1_id`=$this->CLIENT_ID AND `supprime_le`IS NULL");
      }else {
        return $this->connection->query("SELECT * FROM `declaration_v` WHERE `client2_id`=$this->CLIENT_ID AND `supprime_le`IS NULL");
      }
    }
#Les déclarations non-ramassées de l'utilisateur connecté
    public function MesDNR(){
      return $this->connection->query("SELECT * FROM `declaration_v` WHERE `numero` not in(SELECT `declaration` FROM `panierramasse` WHERE `etat` IN('En cours','Valide')) AND `client1_id`=$this->CLIENT_ID AND `supprime_le`IS NULL ORDER BY `date` DESC");
    }

    public function SupprimerClient(){
      if (get_class($this)=='ClientLve') {
        $this->connection->query("UPDATE `client_lve` SET AND `supprime_le`=now() WHERE `CLIENT_COD`='$this->CLIENT_COD'");
      }else {
        $this->connection->query("UPDATE `client` SET `supprime_le`=now() WHERE `CLIENT_COD`='$this->CLIENT_COD'");
      }
    }

    public function ExistanceClient(){
      if (get_class($this)=='ClientLve') {
        $result = $this->connection->query("SELECT * FROM `client_lve` WHERE `CLIENT_COD`='$this->CLIENT_COD' AND `NOM`='$this->NOM' AND `PRENOM`='$this->PRENOM' AND `supprime_le`IS NULL");
        if ($result) {
          if ($result->num_row>0) {
            return true;
          }else {
            return false;
          }
        }else {
          return false;
        }
      }else {
        $result = $this->connection->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$this->CLIENT_COD' AND `NOM`='$this->NOM'  AND `PRENOM`='$this->PRENOM' AND `supprime_le`IS NULL");
        if ($result) {
          if ($result->num_row>0) {
            return true;
          }else {
            return false;
          }
        }else {
          return false;
        }
      }
    }
}
/**
 * ############################################### Client  #############################################
 */
class ClientLve extends Clients
{
  public $login;
  public $mot_de_passe;
  public $adresse;
  public $ville;
  public $CLIENT_COD2;
  public $debinterval;
  public $fininterval;
  public $intervalag_deb;
  public $intervalag_fin;
  function __construct()
  {
    $this->CLIENT_COD2 = "E0000";
    $this->debinterval = 50000;
    $this->fininterval = 50200;
    $this->intervalag_deb = 50000;
    $this->intervalag_fin = 50020;
    $this->login = NULL;
    $this->mot_de_passe = "12345678";
    $this->adresse = NULL;
    $this->ville = NULL;
    parent::__construct();
  }
  public function TrouverClient($id){
    $result = $this->connection->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=$id");
    if ($result) {
      if ($result->num_rows>0) {
        foreach ($result as $client) {
          $this->CLIENT_ID = $client['CLIENT_ID'];
          $this->CLIENT_COD = $client['CLIENT_COD'];
          $this->NOM = $client['NOM'];
          $this->PRENOM = $client['PRENOM'];
          $this->CIVILITE_COD = $client['CIVILITE_COD'];
          $this->CLIENT_TYP = $client['CLIENT_TYP'];
          $this->IDENTITE_TYP = $client['IDENTITE_TYP'];
          $this->IDENTITE_VAL = $client['IDENTITE_VAL'];
          $this->ID_FISCALE = $client['ID_FISCALE'];
          $this->CAPITAL_SOC = $client['CAPITAL_SOC'];
          $this->CREATION_DAT = $client['CREATION_DAT'];
          $this->CLIENT_ETA = $client['CLIENT_ETA'];
          $this->MOTIF_ETA = $client['MOTIF_ETA'];
          $this->SECTEUR_COD = $client['SECTEUR_COD'];
          $this->EMPLOYE_ID = $client['EMPLOYE_ID'];
          $this->SAISIE_DAT = $client['SAISIE_DAT'];
          $this->AGENCE_COD = $client['AGENCE_COD'];
          $this->CLIENT_COD2 = $client['CLIENT_COD2'];
          $this->debinterval = $client['debinterval'];
          $this->fininterval = $client['fininterval'];
          $this->intervalag_deb = $client['intervalag_deb'];
          $this->intervalag_fin = $client['intervalag_fin'];
          $this->commentaire = $client['commentaire'];
          $this->mail = $client['mail'];
          $this->ICE = $client['ICE'];
          $this->telephone = $client['telephone'];
          $this->login = $client['login'];
          $this->mot_de_passe = $client['mot_de_passe'];
          $this->adresse = $client['adresse'];
          $this->ville = $client['ville'];
        }
      }else
      return false;
    }else
    return false;
  }
  public function TrouverClientParCode($code){
    $result = $this->connection->query("SELECT * FROM `client_lve` WHERE `CLIENT_COD`='$code'");
    if ($result) {
      if ($result->num_rows>0) {
        foreach ($result as $client) {
          $this->TrouverClient($client['CLIENT_ID']);
        }
        return true;
      }else
      return false;
    }else
    return false;
  }
  public function MesClient(){
    return $this->connection->query("SELECT * FROM `client` WHERE `CLIENT_ID_client_lve`=$this->CLIENT_ID AND `supprime_le`IS NULL");
  }
  public function MesSessions(){
    return $this->connection->query("SELECT * FROM `client_lve_session` WHERE `REFERENCIEE`=$this->CLIENT_ID AND `supprime_le`IS NULL");
  }
  public function MesTopDeclarations(){
    return $this->connection->query("SELECT * FROM `declaration_v` WHERE `client1_id`=$this->CLIENT_ID ORDER BY `date` DESC LIMIT 5 AND `supprime_le`IS NULL");
  }
  public function MesDeclarations(){
    return $this->connection->query("SELECT * FROM `declaration_v` WHERE `client1_id`=$this->CLIENT_ID ORDER BY `date` AND `supprime_le`IS NULL");
  }
  public function AjouterClient(){
    $this->mot_de_passe = sha1($this->mot_de_passe);
    $this->connection->query("INSERT INTO `client_lve`( `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD2`, `debinterval`, `fininterval`, `intervalag_deb`, `intervalag_fin`, `commentaire`, `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`, `mot_de_passe`) VALUES ('$this->CLIENT_COD','$this->NOM','$this->PRENOM','$this->CIVILITE_COD','$this->CLIENT_TYP','$this->IDENTITE_TYP','$this->IDENTITE_VAL','$this->ID_FISCALE',$this->CAPITAL_SOC,'$this->CREATION_DAT','$this->CLIENT_ETA',$this->MOTIF_ETA,'$this->SECTEUR_COD',$this->EMPLOYE_ID,'$this->SAISIE_DAT','$this->AGENCE_COD','$this->CLIENT_COD2',$this->debinterval,$this->fininterval,$this->intervalag_deb,$this->intervalag_fin,'$this->commentaire','$this->mail','$this->ICE','$this->adresse','$this->ville','$this->telephone','$this->login','$this->mot_de_passe'`)");
    return $this->connection->insert_id;
  }
  public function ModifierClient($par){
    #$this->mot_de_passe = sha1($this->mot_de_passe);
    $this->connection->query("UPDATE `client_lve` SET `CLIENT_COD`='$this->CLIENT_COD',`NOM`='$this->NOM',`PRENOM`='$this->PRENOM',`CIVILITE_COD`='$this->CIVILITE_COD',`CLIENT_TYP`='$this->CLIENT_TYP',`IDENTITE_TYP`='$this->IDENTITE_TYP',`IDENTITE_VAL`='$this->IDENTITE_VAL',`ID_FISCALE`='$this->ID_FISCALE',`CAPITAL_SOC`=$this->CAPITAL_SOC,`CREATION_DAT`='$this->CREATION_DAT',`CLIENT_ETA`='$this->CLIENT_ETA',`MOTIF_ETA`=$this->MOTIF_ETA,`SECTEUR_COD`='$this->SECTEUR_COD',`EMPLOYE_ID`=$this->EMPLOYE_ID,`SAISIE_DAT`='$this->SAISIE_DAT',`AGENCE_COD`='$this->AGENCE_COD',`CLIENT_COD2`='$this->CLIENT_COD2',`debinterval`=$this->debinterval,`fininterval`=$this->fininterval,`intervalag_deb`=$this->intervalag_deb,`intervalag_fin`=$this->intervalag_fin,`commentaire`='$this->commentaire',`mail`='$this->mail',`ICE`='$this->ICE',`adresse`='$this->adresse',`ville`='$this->ville',`telephone`='$this->telephone',`login`='$this->login',`mot_de_passe`='$this->mot_de_passe',`modifie_le`=now(),`commit_par`='$par' WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }
  public function ConnecterClient(){
    $this->connection->query("UPDATE `client_lve` SET `IDENTITE_TYP`='co' WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }
  public function DeconnecterClient(){
    $this->connection->query("UPDATE `client_lve` SET `IDENTITE_TYP`='de' WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }
  public function carnetEncours(){
    $declars = $this->connection->query("SELECT * FROM `panierramasse` WHERE `etat`='En cours' AND `numeroCarnet` in(SELECT `numeroCarnet` FROM `ramasse` WHERE `user_id`=$this->CLIENT_ID)");
    if ($declars->num_rows>0) {
      foreach ($declars as $declar) {
        return $declar['numeroCarnet'];
      }
    }else {
      return 'nouv';
    }
  }
  #Code de ramassage du carnet en cours et qui n'est pas encore validé
    public function coderamassageEncours(){
      $declars = $this->connection->query("SELECT * FROM `ramasse` WHERE `numeroCarnet` in(SELECT `numeroCarnet` FROM `panierramasse` WHERE `etat`='En cours')  AND `user_id`=$this->CLIENT_ID AND `supprime_le`IS NULL");
      if ($declars->num_rows>0) {
        foreach ($declars as $declar) {
          return $declar['code_ramassage'];
        }
      }else {
        return 0;
      }
    }
}

/**
 * ############################################### Sous Client  #############################################
 */
class SousClient extends Clients
{
  public $id_user;
  function __construct()
  {
    $this->id_user = NULL;
    parent::__construct();
  }
  public function TrouverClient($id){
    $result = $this->connection->query("SELECT * FROM `client` WHERE `CLIENT_ID`=$id");
    if ($result) {
      if ($result->num_rows>0) {
        foreach ($result as $client) {
          $this->CLIENT_ID = $client['CLIENT_ID'];
          $this->CLIENT_COD = $client['CLIENT_COD'];
          $this->NOM = $client['NOM'];
          $this->PRENOM = $client['PRENOM'];
          $this->CIVILITE_COD = $client['CIVILITE_COD'];
          $this->CLIENT_TYP = $client['CLIENT_TYP'];
          $this->IDENTITE_TYP = $client['IDENTITE_TYP'];
          $this->IDENTITE_VAL = $client['IDENTITE_VAL'];
          $this->ID_FISCALE = $client['ID_FISCALE'];
          $this->CAPITAL_SOC = $client['CAPITAL_SOC'];
          $this->CREATION_DAT = $client['CREATION_DAT'];
          $this->CLIENT_ETA = $client['CLIENT_ETA'];
          $this->MOTIF_ETA = $client['MOTIF_ETA'];
          $this->SECTEUR_COD = $client['SECTEUR_COD'];
          $this->EMPLOYE_ID = $client['EMPLOYE_ID'];
          $this->SAISIE_DAT = $client['SAISIE_DAT'];
          $this->AGENCE_COD = $client['AGENCE_COD'];
          $this->commentaire = $client['commentaire'];
          $this->mail = $client['mail'];
          $this->ICE = $client['ICE'];
          $this->telephone = $client['telephone'];
          $this->id_user = $client['CLIENT_ID_client_lve'];
        }
      }else
      return false;
    }else
    return false;
  }
  public function TrouverClientParCode($code){
    $result = $this->connection->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$code'");
    if ($result) {
      if ($result->num_rows>0) {
        foreach ($result as $client) {
          $this->TrouverClient($client['CLIENT_ID']);
        }
        return true;
      }else
      return false;
    }else
    return false;
  }
  public function TrouverUserClientParCode($code,$user){
    $result = $this->connection->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$code' AND `CLIENT_ID_client_lve`=$user");
    if ($result) {
      if ($result->num_rows>0) {
        foreach ($result as $client) {
          $this->TrouverClient($client['CLIENT_ID']);
          break;
        }
        return true;
      }else
      return false;
    }else
    return false;
  }
  public function MesAdresses(){
    return $this->connection->query("SELECT * FROM `adresses` WHERE `id_client`=$this->CLIENT_ID");
  }
  public function DerniereAdresse(){
    return $this->connection->query("SELECT * FROM `adresses` WHERE `id_client`='$this->CLIENT_ID' ORDER BY `id_adresse` DESC LIMIT 1");
  }
  public function DernierClient(){
    $dercs = $this->connection->query("SELECT * FROM `client` ORDER BY `CLIENT_ID` DESC LIMIT 1");
    foreach ($dercs as $derc) {
      $this->TrouverClient($derc['CLIENT_ID']);
    }
  }
  public function AjouterClient(){
    $this->connection->query("INSERT INTO `client`(`NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD`, `commentaire`, `mail`, `ICE`, `CLIENT_ID_client_lve`, `telephone`) VALUES ('$this->NOM','$this->PRENOM','$this->CIVILITE_COD','$this->CLIENT_TYP','$this->IDENTITE_TYP','$this->IDENTITE_VAL','$this->ID_FISCALE',$this->CAPITAL_SOC,'$this->CREATION_DAT','$this->CLIENT_ETA',$this->MOTIF_ETA,'$this->SECTEUR_COD',$this->EMPLOYE_ID,'$this->SAISIE_DAT','$this->AGENCE_COD','$this->CLIENT_COD','$this->commentaire','$this->mail','$this->ICE',$this->id_user,'$this->telephone')");
    $this->TrouverClient($this->connection->insert_id);
    return $this->CLIENT_ID;
  }
  public function ModifierClient($par){
    $this->connection->query("UPDATE `client`  SET `CLIENT_COD`='$this->CLIENT_COD',`NOM`='$this->NOM',`PRENOM`='$this->PRENOM',`CIVILITE_COD`='$this->CIVILITE_COD',`CLIENT_TYP`='$this->CLIENT_TYP',`IDENTITE_TYP`='$this->IDENTITE_TYP',`IDENTITE_VAL`='$this->IDENTITE_VAL',`ID_FISCALE`='$this->ID_FISCALE',`CAPITAL_SOC`=$this->CAPITAL_SOC,`CREATION_DAT`='$this->CREATION_DAT',`CLIENT_ETA`='$this->CLIENT_ETA',`MOTIF_ETA`=$this->MOTIF_ETA,`SECTEUR_COD`='$this->SECTEUR_COD',`EMPLOYE_ID`=$this->EMPLOYE_ID,`SAISIE_DAT`='$this->SAISIE_DAT',`AGENCE_COD`='$this->AGENCE_COD',`commentaire`='$this->commentaire',`mail`='$this->mail',`ICE`='$this->ICE',`CLIENT_ID_client_lve`=$this->id_user,`telephone`='$this->telephone',`modifie_le`=now(),`commit_par`='$par' WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }
  public function setNull(){
      $this->connection->query("UPDATE `client` SET `CLIENT_COD`=NULL WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }

  }
?>
