<?php
include_once "ClassesInstance.php";
$total =0;
if (isset($_SESSION['questionnaire_id'])) {
  if ($questionnaire->getQuestionnaire($_SESSION['questionnaire_id'])) {
    foreach ($questionnaire->getQuestions() as $quetion) {
      $question->Trouver_Question($quetion['id_question']);
      $countquestion = 0;
      foreach ($question->getReponsesUser($_SESSION['user_id']) as $user_reponse) {
        foreach ($question->getReponsesV() as $v_reponse) {
          if ($v_reponse['id_reponses']==$user_reponse['id_reponse']) {
            $countquestion+=1;
          }
        }
      }
      if ($countquestion ==$question->getReponsesV()->num_rows && $question->getReponsesUser($_SESSION['user_id'])->num_rows == $question->getReponsesV()->num_rows) {
        $total +=($countquestion/$question->getReponsesV()->num_rows);
      }
    }
  }
  $questionnaire->Insert_score_utilisateur($_SESSION['user_id'],$total);
}else {
  $_SESSION['typage']="";
  header('location: Erreur');
}

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Questionnaire - score</title>
    <?php
    include_once "styles.php";
    include_once "scripts.php";
     ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php
          if ($questionnaire->getQuestionnaire($_SESSION['questionnaire_id'])) {
            ?>
            <h1><?=$questionnaire->titre; ?></h1>
            <h6 class="text-center">

              <span class="totalscore text-center">
                Votre Résultat est : <?=$total." / ".$questionnaire->getQuestions()->num_rows; ?>
              </span>
            </h6>
            <?php
            foreach ($questionnaire->getQuestions() as $quetion) {
              $question->Trouver_Question($quetion['id_question']);
              ?>
              <div class="question">
              <h3><?=$question->question; ?></h3>
              <?php
              foreach ($question->getReponses() as $allrep) {
                ?>
                  <h6 style="color:<?=$Reponse_questionnaire->validite_reponse($allrep['id_reponses'], $_SESSION['user_id'],$_SESSION['questionnaire_id']);?>;">
                    <?= $allrep['reponse'];?>
                  </h6>
                <?php
              }
              ?> </div><?php
            }
          }
           ?>
        </div>
      </div>
      <div class="text-center">
        <a href="destroy.php">Terminer le questionnaire</a>
      </div>
    </div>
  </body>
</html>
