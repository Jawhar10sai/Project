<?php

class Agences
{
  public $AGENCE_COD,
    $AGENCE_LIB,
    $AGENCE_ADRESSE,
    $AGENCE_TEL,
    $modifie_le,
    $supprime_le,
    $commit_par;

  function __construct()
  {
    $this->AGENCE_COD = "";
    $this->AGENCE_LIB = "";
    $this->AGENCE_ADRESSE = "";
    $this->AGENCE_TEL = NULL;
    $this->modifie_le = NULL;
    $this->supprime_le = NULL;
    $this->commit_par = NULL;
  }

  public static function TrouverAgence($id)
  {
    $result = Connexion::getConnexion()->prepare("select * from agence where AGENCE_COD=? AND supprime_le IS NULL");
    if ($result->execute[$id]) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    }
  }

  public static function ListeAgences()
  {
    return  Connexion::getConnexion()
      ->query("select * from agence where supprime_le IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
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
    $stmt = $this->connection->prepare("INSERT INTO `agence`(`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`) VALUES (:AGENCE_COD,:AGENCE_LIB,:AGENCE_ADRESSE,:AGENCE_TEL,:commit_par)");
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
    $stmt = $this->connection->prepare("UPDATE `agence` set `AGENCE_LIB`=:AGENCE_LIB, `AGENCE_ADRESSE`=:AGENCE_ADRESSE, `AGENCE_TEL`=:AGENCE_TEL,`modifie_le`=now()  where `AGENCE_COD`=:AGENCE_COD");
    if ($stmt->execute($liste_donnees))
      return $this->AGENCE_COD;
    else
      return false;
  }

  public function SupprimerAgence()

  {
    $stmt = $this->connection->prepare("UPDATE `agence` SET `supprime_le`=now(),`commit_par`=:commit_par, WHERE `id_adresse`=:id");
    if ($stmt->execute(array(':id' => $this->id, ':commit_par' => $this->commit_par)))
      return true;
    else
      return false;
  }
  public function AgenceLivreur()
  {
    return Livreurs::LivreurAgence($this->AGENCE_COD);
  }
}
