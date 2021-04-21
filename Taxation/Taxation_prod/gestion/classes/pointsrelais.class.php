<?php
require_once "conftaxDB.php";
/**
 *
 */
class PointsRelais
{
  public $id_pr, $lib_pr, $id_ville, $loc_ver, $loc_hor;
  protected $connection;
  function __construct()
  {
    //Connection::getConnection() = $GLOBALS['conn'];
  }

  private function AjouterPointsrelais()
  {
    $liste_donnees = array(
      ':lib_pr' => $this->lib_pr,
      ':id_ville' => $this->id_ville,
      ':loc_ver' => $this->loc_ver,
      ':loc_hor' => $this->loc_hor
    );
    $stmt = Connection::getConnection()->prepare("INSERT INTO `points_relais`(`lib_pr`, `id_ville`, `loc_ver`, `loc_hor`) VALUES (:lib_pr,:id_ville,:loc_ver,:loc_hor)");
    if ($stmt->execute($liste_donnees))
      return $this->lib_pr;
    else
      return false;
  }
  private function ModifierPointsrelais()
  {
    $liste_donnees = array(
      ':id_pr' => $this->id_pr,
      ':lib_pr' => $this->lib_pr,
      ':id_ville' => $this->id_ville,
      ':loc_ver' => $this->loc_ver,
      ':loc_hor' => $this->loc_hor
    );
    $stmt = Connection::getConnection()->prepare("UPDATE `points_relais` SET `lib_pr`=:lib_pr,`id_ville`=:id_ville,`loc_ver`=:loc_ver,`loc_hor`=:loc_hor WHERE `id_pr`=:id_pr");
    if ($stmt->execute($liste_donnees))
      return $this->lib_pr;
    else
      return false;
  }

  public function Enregistrer()
  {
    if ($this->id_pr != NULL)
      $this->ModifierPointsrelais();
    else
      $this->AjouterPointsrelais();
  }

  public function SuppimerPointsrelais()
  {
    $stmt = Connection::getConnection()->prepare("DELETE FROM `points_relais` WHERE `id_pr`=?");
    if ($stmt->execute([$this->id_pr]))
      return true;
    else
      return false;
  }
  public static function PointRelaisVille($code)
  {
    $result = Connection::getConnection()->query("SELECT * FROM `points_relais` WHERE `id_ville`=? AND `supprime_le`IS NULL");
    if ($result->execute([$code])) {
      $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    } else
      return false;
  }
}
