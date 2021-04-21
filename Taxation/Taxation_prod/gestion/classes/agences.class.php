<?php

/**
 *
 */
class Agence
{
  public $AGENCE_COD, $AGENCE_LIB, $AGENCE_ADRESSE, $AGENCE_TEL, $modifie_le, $supprime_le, $commit_par;
  function __construct()
  {
    $this->AGENCE_COD = "";
    $this->AGENCE_LIB = "";
    $this->AGENCE_ADRESSE = "";
    $this->AGENCE_TEL = "";
    $this->modifie_le = NULL;
    $this->supprime_le = NULL;
    $this->commit_par = NULL;
  }
  public static function ListeAgences()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `agence` Where `supprime_le`IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  public static function TrouverAgence($code)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `agence` where `AGENCE_COD`=? AND `supprime_le` IS NULL");
    if ($result->execute([$code])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public function AjouterAgence()
  {
    $liste_donnees = array(
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':AGENCE_LIB' => $this->AGENCE_LIB,
      ':AGENCE_ADRESSE' => $this->AGENCE_ADRESSE,
      ':AGENCE_TEL' => $this->AGENCE_TEL,
      ':commit_par' => $this->commit_par
    );
    $stmt = Connection::getConnection()->prepare("INSERT INTO `agence`(`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`) VALUES (:AGENCE_COD,:AGENCE_LIB,:AGENCE_ADRESSE,:AGENCE_TEL,:commit_par)");
    if ($stmt->execute($liste_donnees))
      return $this->AGENCE_COD;
    else
      return false;
  }
  public function ModifierAgence()
  {
    $liste_donnees = array(
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':AGENCE_LIB' => $this->AGENCE_LIB,
      ':AGENCE_ADRESSE' => $this->AGENCE_ADRESSE,
      ':AGENCE_TEL' => $this->AGENCE_TEL,
      ':commit_par' => $this->commit_par
    );
    $stmt = Connection::getConnection()->prepare("UPDATE `agence` set `AGENCE_LIB`=:AGENCE_LIB, `AGENCE_ADRESSE`=:AGENCE_ADRESSE, `AGENCE_TEL`=:AGENCE_TEL,`modifie_le`=now()  where `AGENCE_COD`=:AGENCE_COD");
    if ($stmt->execute($liste_donnees))
      return $this->AGENCE_COD;
    else
      return false;
  }
  public function SupprimerAgence()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `agence` SET `supprime_le`=now(),`commit_par`=:commit_par, WHERE `id_adresse`=:id");
    if ($stmt->execute(array(':id' => $this->id, ':commit_par' => $this->commit_par)))
      return true;
    else
      return false;
  }
}
