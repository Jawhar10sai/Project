<?php

class Villes
{
  public $VILLE_COD, $AGENCE_COD, $VILLE_LIB, $VILLE_TYP, $DELAI, $ZONE_COD;
  protected $connection, $liste_donnees;

  function __construct()
  {
    $this->VILLE_COD = "";
    $this->AGENCE_COD = "";
    $this->VILLE_LIB = "";
    $this->VILLE_TYP = NULL;
    $this->DELAI = NULL;
    $this->ZONE_COD = NULL;
  }

  public static function TrouverVille($code)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `ville` WHERE `VILLE_COD`=?");
    if ($result->execute([$code])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function TrouverVilleLib($ville)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `ville` WHERE `VILLE_LIB` LIKE ? LIMIT 1");
    if ($result->execute([$ville])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function ListeVilles()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `ville` WHERE `VILLE_TYP`=1  AND `supprime_le` IS NULL ORDER BY `VILLE_LIB`")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  private function ActualiserListe()
  {
    $this->liste_donnees = array(
      ':VILLE_COD' => $this->VILLE_COD,
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':VILLE_LIB' => $this->VILLE_LIB,
      ':VILLE_TYP' => $this->VILLE_TYP,
      ':DELAI' => $this->DELAI,
      ':ZONE_COD' => $this->ZONE_COD,
      ':commit_par' => $this->commit_par
    );
  }
  public function AjouterVille()
  {
    $this->ActualiserListe();
    $stmt = Connection::getConnection()->prepare("INSERT INTO `ville`(`VILLE_COD`,`AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`,`commit_par`) VALUES (:VILLE_COD,:AGENCE_COD,:VILLE_LIB,:VILLE_TYP,:DELAI,:ZONE_COD,:commit_par)");
    if ($stmt->execute($this->liste_donnees))
      return $this->VILLE_LIB;
    else
      return false;
  }
  public function ModifierVille()
  {
    $this->ActualiserListe();
    $stmt = Connection::getConnection()
      ->prepare("UPDATE `ville` SET `AGENCE_COD`=:AGENCE_COD,`VILLE_LIB`=:VILLE_LIB,`VILLE_TYP`=:VILLE_TYP,`DELAI`=:DELAI,`ZONE_COD`=:ZONE_COD,`modifie_le`=now(),`commit_par`=:commit_par WHERE `VILLE_COD`=:VILLE_COD");
    if ($stmt->execute($this->liste_donnees))
      return $this->VILLE_LIB;
    else
      return false;
  }
  public function SupprimerVille()
  {
    Connection::getConnection()->query("UPDATE `ville` SET `supprime_le`=now() WHERE `VILLE_COD`=$this->VILLE_COD");
  }
  public function Aagence()
  {
    return Agence::TrouverAgence($this->VILLE_COD);
  }
  public function AgenceVille()
  {
    return Agence::TrouverAgence($this->AGENCE_COD);
  }
  public function Apointsrelais()
  {
    return  PointsRelais::PointRelaisVille($this->VILLE_COD);
  }
  public static function DerniereVille()
  {
    $result = Connection::getConnection()->query("SELECT * FROM `ville` WHERE `supprime_le` IS NULL ORDER BY `VILLE_COD` DESC LIMIT 1");
    if ($result) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function ListeVilleExcept($ville)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `ville` WHERE `supprime_le` IS NULL AND `VILLE_COD` NOT LIKE ? ORDER BY `VILLE_LIB`");
    return ($result->execute([$ville])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
  }
  public static function ListeVilleExceptLib($ville)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `ville` WHERE `supprime_le` IS NULL AND `VILLE_LIB` NOT LIKE ? ORDER BY `VILLE_LIB`");
    return ($result->execute([$ville])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
  }

  public function ClientsVille()
  {
    return ClientLve::ClientsVille($this->VILLE_LIB);
  }

  public function AdressesVille()
  {
    return Adresses::AdresseVille($this->VILLE_COD);
  }

  public function ConsignesVille()
  {
    return Consigne::CongisnesVille($this->VILLE_LIB);
  }
}
