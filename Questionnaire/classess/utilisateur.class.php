<?php
include_once "connection.php";
/**
 *
 */

class Utilisateur
{
  public $id;
  public $nom;
  public $prenom;
  protected $connection;
  function __construct()
  {
    $this->connection = $GLOBALS['connection'];
  }
  public function Trouver_utilisateur($id){
    $result =  $this->connection->query("SELECT * FROM `user` WHERE `id_user`=$id");
    if ($result->num_rows>0) {
      foreach ($result as $user) {
        $this->id = $user['id_user'];
        $this->nom = $user['nom'];
        $this->prenom = $user['prenom'];
      }
    }
  }
  public function Ajouter_utilisateur(){
    $result =  $this->connection->query("SELECT * FROM `user` WHERE `nom`='$this->nom' AND `prenom`='$this->prenom'");
    if ($result->num_rows>0) {
      foreach ($result as $user) {
        return $user['id_user'];
      }
    }else {
      $this->connection->query("INSERT INTO `user`(`nom`, `prenom`) VALUES ('$this->nom','$this->prenom')");
      $ids =  $this->connection->query("SELECT LAST_INSERT_ID() AS `id`");
      foreach ($ids as $value) {
        return $value['id'];
      }
    }
  }
  public function Liste_utilisateurs(){
    return $this->connection->query("SELECT * FROM `user`");
  }
  public function Questionnaire_utilisateur(){
    return $this->connection->query("SELECT * FROM `score_questionnaire` WHERE `id_user`=$this->id");
  }
  public function ID_utilisateur(){
    $result =  $this->connection->query("SELECT * FROM `user` WHERE `nom`='$this->nom' AND `prenom`='$this->prenom'");
    if ($result->num_rows>0) {
      foreach ($result as $user) {
        return $user['id_user'];
      }
    }
  }
  public function score_utilisateur($id){
    $result = $this->connection->query("SELECT * FROM `score_questionnaire` WHERE `id_user`=$this->id AND `id_questionnaire`=$id");
    if ($result->num_rows>0) {
      foreach ($result as $score) {
        return $score['score'];
      }
    }else {
      return 0;
    }
  }
  public function score_date_passage_utilisateur($id){
    $result = $this->connection->query("SELECT * FROM `score_questionnaire` WHERE `id_user`=$this->id AND `id_questionnaire`=$id");
    if ($result->num_rows>0) {
      foreach ($result as $score) {
        return date('d/m/Y',strtotime($score['date_passage']));
      }
    }else {
      return false;
    }
  }

}
 ?>
