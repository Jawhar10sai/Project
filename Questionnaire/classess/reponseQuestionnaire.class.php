<?php
include_once "connection.php";
/**
 *
 */
class reponseQuestionnaire
{
  public $id_questionnaire;
  public $id_reponse;
  public $id_question;
  public $id_user;
  public $score;
  protected $connection;
  function __construct()
  {
    $id_questionnaire ="";
    $id_reponse ="";
    $id_question ="";
    $id_user ="";
    $score =0;
    $this->connection = $GLOBALS['connection'];
  }
  public function repondre(){
    $this->connection->query("INSERT INTO `reponses_questionnaire`(`id_questionnaire`, `id_question`, `id_user`, `id_reponse`, `score`) VALUES ($this->id_questionnaire,$this->id_question,$this->id_user,$this->id_reponse,$this->score)");
  }
  public function TestReponse()
  {
    $questions = $this->connection->query("SELECT * FROM `reponses` WHERE `id_reponses`=$this->id_reponse AND `id_question`=$this->id_question AND `validite`='v'");
    if ($questions->num_rows>0) {
      return true;
    }else {
      return false;
    }
  }
  public function ReponseV(){
    $questions = $this->connection->query("SELECT SUM(`score`) AS `count_score` FROM `reponses_questionnaire` WHERE `id_user`=$this->id_user AND `id_question`=$this->id_question");
    foreach ($questions as $value) {
      return $value['count_score'];
    }
  }
  public function validite_reponse($reponse, $user,$questionnaire){
    $questions = $this->connection->query("SELECT * FROM `reponses_questionnaire` WHERE `id_questionnaire`=$questionnaire AND `id_user`=$user AND`id_reponse`=$reponse");
    if ($questions->num_rows>0) {
      foreach ($questions as $question) {
        if ($question['score'] == 1) {
          return "#4AC500";
        }else {
          return "red";
        }
      }
    }else {
      return " ";
    }
  }



  }
 ?>
