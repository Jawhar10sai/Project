<?php
include_once "connection.php";
/**
 *
 */
class reponse
{
  public $id;
  public $reponse;
  public $id_question;
  public $validite;
  public $point;
  protected $connection;
  function __construct()
  {
    $this->id = "";
    $this->reponse = "";
    $this->id_question = "";
    $this->validite = "F";
    $this->point = 0;
    $this->connection = $GLOBALS['connection'];
  }
  public function Trouver_reponses($id){
    $questions = $this->connection->query("SELECT * FROM `reponses` WHERE `id_reponses`=$id");
    if ($questions) {
      if ($questions->num_rows>0) {
      foreach ($questions as $question) {
        $this->id = $question['id_reponses'];
        $this->reponse = $question['reponse'];
        $this->id_question = $question['id_question'];
        $this->validite = $question['validite'];
        $this->point = $question['point'];
      }
    }
    return true;
    }else {
      return false;
    }
  }
  public function Ajouter_reponse(){
    $this->connection->query("INSERT INTO `reponses`(`reponse`, `id_question`, `validite`) VALUES ('$this->reponse',$this->id_question,'$this->validite')");
  }
  public function Modifier_reponse(){
    $this->connection->query("UPDATE `reponses` SET `reponse`='$this->reponse',`id_question`=$this->id_question,`validite`='$this->validite',`point`=$this->point WHERE `id_reponses`=$this->id");
  }
  public function autre_validite(){
    $result = $this->connection->query("SELECT * FROM `reponses` WHERE `validite`<> '$this->validite'");
    foreach ($result as $autrevalidite) {
      return $autrevalidite['validite'];
    }
  }
  public function Count_reponses(){
    $questions = $this->connection->query("SELECT * FROM `reponses` WHERE `id_question`=$this->id_question AND `validite`='V'");
    return $questions->num_rows;
  }

  }
 ?>
