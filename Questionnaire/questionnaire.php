<?php
include_once "ClassesInstance.php";
/*************************** Déclarations ******************************/
if (isset($_SESSION['questionnaire_id'])) {
  $questionnaire->getQuestionnaire($_SESSION['questionnaire_id']);
  if ($questionnaire->UserPassed($_SESSION['user_id'])) {
    $_SESSION['typage']="DP";
    header('location: Erreur');
  }
  if (isset($_POST)) {
    foreach ($_POST as $key => $id_rep) {
      if ($key!='Valider') {
        if ($reponse->Trouver_reponses($id_rep)) {
          $Reponse_questionnaire->id_questionnaire =$_SESSION['questionnaire_id'];
          $Reponse_questionnaire->id_reponse =$reponse->id;
          $Reponse_questionnaire->id_user =$_SESSION['user_id'];
          $Reponse_questionnaire->id_question =$reponse->id_question;
         if ($Reponse_questionnaire->TestReponse()) {
              $Reponse_questionnaire->score=1;
            }else {
              $Reponse_questionnaire->score=0;
            }
            $Reponse_questionnaire->repondre();
            header('location: Resultat');
      }
      }
    }
  }
}else {
  $_SESSION['typage']="";
  header('location: Erreur');
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    include_once "styles.php";
    include_once "scripts.php";
    include_once "classess/connection.php";
    #$questionnaire = $connection->query("SELECT * FROM `questionnaire` WHERE `id_questionnaire`=".$_SESSION['questionnaire_id']);
    #$questions = $connection->query("SELECT * FROM `questions` WHERE `id_questionnaire`=".$_SESSION['questionnaire_id']);
    /*foreach ($questionnaire as $questionn) {
      $titre_questionnaire = $questionn['titre_questionnaire'];
    }*/
     ?>
  </head>
  <body>
    <div class="header-questionnaire">
      <div class="row">
        <div class="col-8">
          <h1>
            <?=$questionnaire->titre; ?>
          </h1>
        </div>
        <div class="col-4 text-right">
            <img src="assets/images/voielvej.png" alt="" style="border-radius:0.5rem;background-color:#fff;margin-top:20px;margin-right:15px;">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 firstdiv">

          <form autocomplete="off" action="" method="post">
            <?php foreach ($questionnaire->getQuestions() as $questions): ?>
              <?php #$reponses = $connection->query("SELECT * FROM `reponses` WHERE `id_question`=".$questions['id_question']);
                $question->Trouver_Question($questions['id_question']);
               ?>
              <div class="question">
                <p><?=$question->question;?></p>
                <?php if ($question->getReponsesV()->num_rows>1): ?>
                  <p style="color:red;">Ps:Cette question a plus q'une réponse.</p>
                <?php endif; ?>
                <div class="choix">
                  <?php foreach ($question->getReponses() as $repon){
                      $reponse->Trouver_reponses($repon['id_reponses']);?>
                    <div class="checkbox">
                      <input type="checkbox" id="rep-<?= $reponse->id;?>" name="<?= $reponse->id;?>" value="<?= $reponse->id;?>">
                      <label for="rep-<?= $reponse->id;?>">
                        <?= $reponse->reponse; ?>
                      </label>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="text-center">
              <button type="submit" class="btn btn-lg btn-success" name="valider">Valider le questionnaire</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
