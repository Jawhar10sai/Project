<?php

class ClientSession
{
  public $AGENCE_COD, $AGENCE_LIB, $REFERENCIEE, $LOGIN, $MOT_D_PASS, $IDENTITE_TYP, $modifie_le, $supprime_le, $commit_par;
  protected $liste_donnees;
  function __construct()
  {
    $this->AGENCE_COD = "";
    $this->AGENCE_LIB = "";
    $this->REFERENCIEE = "";
    $this->LOGIN = "";
    $this->MOT_D_PASS = "12345678";
    $this->IDENTITE_TYP = "de";
    $this->modifie_le = NULL;
    $this->supprime_le = NULL;
    $this->commit_par = NULL;
  }
  private function ActualiserListe()
  {
    $this->liste_donnees = array(
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':AGENCE_LIB' => $this->AGENCE_LIB,
      ':REFERENCIEE' => $this->REFERENCIEE,
      ':LOGIN' => $this->LOGIN,
      ':MOT_D_PASS' => $this->MOT_D_PASS,
      ':IDENTITE_TYP' => $this->IDENTITE_TYP,
      ':commit_par' => $this->commit_par
    );
  }
  public static function VerifierCompte($login, $mot_de_passe)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client_lve_session` WHERE `LOGIN`=? AND `MOT_D_PASS`=? AND `supprime_le` IS NULL");
    if ($result->execute([$login, $mot_de_passe])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function ListeSessions()
  {
    return Connection::getConnection()
      ->prepare("SELECT * FROM `client_lve_session`")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  public static function TrouverSession($id)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client_lve_session` WHERE `AGENCE_COD`=?");
    if ($result->execute([$id])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public function AjouterSession()
  {
    $client = ClientLve::TrouverClient($this->REFERENCIEE);
    if ($client->intervalag_deb < $client->intervalag_fin) {
      $interval = $client->intervalag_deb + 1;
      $this->AGENCE_COD = $client->NOM . "-" . (string)$interval;
      $this->LOGIN = $this->AGENCE_COD;
      $this->MOT_D_PASS = sha1($this->MOT_D_PASS);
      $this->ActualiserListe();
      $stmt = Connection::getConnection()
        ->prepare("INSERT INTO `client_lve_session`(`AGENCE_COD`, `AGENCE_LIB`, `REFERENCIEE`, `LOGIN`, `MOT_D_PASS`,`IDENTITE_TYP`, `commit_par`) VALUES (:AGENCE_COD,:AGENCE_LIB,:REFERENCIEE,:LOGIN,:MOT_D_PASS,:IDENTITE_TYP, :commit_par)");
      if ($stmt->execute($this->liste_donnees)) {
        $client->intervalag_deb = $interval;
        $client->Enregistrer();
      } else
        return false;
    }
  }
  public function ModifierSession()
  {
    $this->ActualiserListe();
    $stmt = Connection::getConnection()->prepare("UPDATE `client_lve_session` SET  `AGENCE_LIB`=:AGENCE_LIB,`modifie_le`=now(),`commit_par`=:commit_par,`REFERENCIEE`=:REFERENCIEE,`LOGIN`=:LOGIN,`MOT_D_PASS`=:MOT_D_PASS,`IDENTITE_TYP`=:IDENTITE_TYP WHERE `AGENCE_COD`=:AGENCE_COD");
    if ($stmt->execute($this->liste_donnees))
      return $this->AGENCE_COD;
    else
      return false;
  }
  public function SupprimerSession()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `client_lve_session` SET `supprime_le`=now(),`commit_par`=? WHERE `AGENCE_COD`=?");
    if ($stmt->execute([$this->commit_par, $this->AGENCE_COD]))
      Connection::getConnection()->query("UPDATE `client_lve` SET `intervalag_fin`=`intervalag_fin`+1 WHERE `CLIENT_ID`=$this->REFERENCIEE");
    else
      return false;
  }
  public function ConnecterSession()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `client_lve_session` SET `IDENTITE_TYP`='co'  WHERE `AGENCE_COD`=?");
    if (!$stmt->execute([$this->AGENCE_COD]))
      return false;
  }
  public function deconnecterSession()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `client_lve_session` SET `IDENTITE_TYP`='de'  WHERE `AGENCE_COD`=?");
    if (!$stmt->execute([$this->AGENCE_COD])) {
      return false;
    }
  }
  public static function SessionsUtilisateur($id)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client_lve_session` WHERE `REFERENCIEE`=? AND `supprime_le` IS NULL");
    if ($result->execute([$id]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;
  }
}
