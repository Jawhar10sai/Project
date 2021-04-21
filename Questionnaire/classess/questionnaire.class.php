<?php
include_once "connection.php";
/**
 *
 */
class questionnaire
{
  public $id;
  public $titre;
  public $statut;
  public $date_creation;
  protected $connection;
  function __construct()
  {
    $this->titre = "";
    $this->statut = "nouveau";
    $this->date_creation = date('Y-m-d');
    $this->connection = $GLOBALS['connection'];
  }
  public function getQuestionnaire($id){
    $result = $this->connection->query("SELECT * FROM `questionnaire` WHERE `id_questionnaire`=$id");
      if ($result->num_rows>0) {
        foreach ($result as $resul) {
          $this->id = $resul['id_questionnaire'];
          $this->titre = $resul['titre_questionnaire'];
          $this->statut = $resul['statut_questionnaire'];
        }
        return true;
      }else {
        return false;
      }
    }
    public function TitreQuestionnaire($id){
      $result = $this->connection->query("SELECT * FROM `questionnaire` WHERE `id_questionnaire`=$id");
        if ($result->num_rows>0) {
          foreach ($result as $resul) {
            return $resul['titre_questionnaire'];
          }
        }
    }
    public function ListeQuestionnaire(){
      $result = $this->connection->query("SELECT * FROM `questionnaire`");
        if ($result->num_rows>0) {
          return $result;
        }else {
          return false;
        }
      }
      public function UserPassed($user)
      {
        $result = $this->connection->query("SELECT * FROM `reponses_questionnaire` WHERE `id_questionnaire`=$this->id AND `id_user`=$user");
        if ($result->num_rows>0) {
          return true;
        }else {
          return false;
        }
      }
      public function AjoutQuestionnaire(){
        $this->connection->query("INSERT INTO `questionnaire`(`titre_questionnaire`,`statut_questionnaire`,`date_creation`) VALUES('$this->titre','$this->statut','$this->date_creation')");
      }
      public function ModifierQuestionnaire(){
        $this->connection->query("UPDATE `questionnaire`SET `titre_questionnaire`='$this->titre',`statut_questionnaire`='$this->statut' WHERE `id_questionnaire`=$this->id");
      }
      public function getQuestions(){
        return $this->connection->query("SELECT * FROM `questions` WHERE `id_questionnaire`=$this->id");
      }
      public function autre_statut(){
        $result = $this->connection->query("SELECT * FROM `questionnaire` WHERE `statut_questionnaire`<> '$this->statut'");
        foreach ($result as $statut) {
          return  $statut['statut_questionnaire'];
        }
      }
      public function score_utilisateur($id){
        return $this->connection->query("SELECT * FROM `score_questionnaire` WHERE `id_questionnaire`=$id");
      }
      public function Insert_score_utilisateur($iduser,$score){
        return $this->connection->query("INSERT INTO `score_questionnaire`(`id_questionnaire`, `id_user`, `score`,`date_passage`) VALUES ($this->id,$iduser,$score,'$this->date_creation')");
      }

  }

 ?>
