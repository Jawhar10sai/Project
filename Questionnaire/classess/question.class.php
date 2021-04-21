<?php
include_once "connection.php";
/**
 *
 */
class question
{
  public $id;
  public $question;
  public $id_questionnaire;
  protected $connection;
  function __construct()
  {
    $this->id = "";
    $this->question = "";
    $this->id_questionnaire = "";
    $this->connection = $GLOBALS['connection'];
  }

  public function Trouver_Question($id){
    $questions = $this->connection->query("SELECT * FROM `questions` WHERE `id_question`=$id");
    if ($questions->num_rows>0) {
      foreach ($questions as $value) {
        $this->id=$value['id_question'];
        $this->question=$value['question'];
        $this->id_questionnaire=$value['id_questionnaire'];
      }
      return true;
    }else {
      return false;
    }
  }
  public function Ajouter_question(){
    $this->connection->query("INSERT INTO `questions`(`question`, `id_questionnaire`) VALUES ('$this->question',$this->id_questionnaire)");
  }
  public function Modifier_question(){
    $this->connection->query("UPDATE `questions` SET `question`='$this->question' WHERE `id_question`=$this->id");
  }
  public function getReponses(){
    return $this->connection->query("SELECT * FROM `reponses` WHERE `id_question`=$this->id");
  }
  public function getReponsesV(){
    return $this->connection->query("SELECT * FROM `reponses` WHERE `validite`='V' AND `id_question`=$this->id");
  }
  public function getReponsesUser($user){
    return $this->connection->query("SELECT * FROM `reponses_questionnaire` WHERE `id_question`=$this->id AND `id_user`=$user");
  }

}
 ?>
