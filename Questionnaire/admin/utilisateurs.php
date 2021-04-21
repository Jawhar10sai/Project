<?php
$activeutil = "active";
include_once 'ClassesInstance.php';
include_once 'navbar.php';
if (isset($_GET['user_id'])) {
  $utilisateur->Trouver_utilisateur($_GET['user_id']);
 ?>
 <div class="container">
   <div class="row">
     <div class="col-12">
       <?php
         if ($questionnaire->getQuestionnaire($_GET['quest_id'])) {
           ?>
           <h1><?=$questionnaire->titre; ?></h1>
           <h6>
             <span class="totalscore ">
               Votre Résultat est : <?=$utilisateur->score_utilisateur($questionnaire->id)." / ".$questionnaire->getQuestions()->num_rows; ?>
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
                 <h6 style="color:<?=$Reponse_questionnaire->validite_reponse($allrep['id_reponses'], $_GET['user_id'],$questionnaire->id);?>;">
                   <?= $allrep['reponse'];?>
                 </h6>
               <?php
             }
             ?> </div>

             <?php
           }
         }
          ?>

     </div>
   </div>
    <h6 class="text-right">Date de passage de questionnaire: <?=$utilisateur->score_date_passage_utilisateur($questionnaire->id); ?></h6>
 </div>
<?php
}else {
?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-stripped">
        <tr>
          <th class="text-center">Nom</th>
          <th class="text-center">Prénom</th>
          <th class="text-center">Nombre de questionnaire passés</th>
        </tr>
        <?php foreach ($utilisateur->Liste_utilisateurs() as $users){
          $utilisateur->Trouver_utilisateur($users['id_user']);
          ?>
          <tr>
          <td class="text-center"><?=$utilisateur->nom; ?></td>
          <td class="text-center"><?=$utilisateur->prenom; ?></td>
          <td class="text-center">
            <a href="#" data-toggle="modal" data-target="#utilisateur<?=$utilisateur->id;?>">
              <?=$utilisateur->Questionnaire_utilisateur()->num_rows; ?>
            </a>
            <div class="modal fade" id="utilisateur<?=$utilisateur->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Les questionnaires passés par: <?=$utilisateur->nom." ".$utilisateur->prenom; ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-stripped">
                      <tr>
                        <th>Questionnaires</th>
                        <th>Score</th>
                      </tr>
                      <?php foreach ($utilisateur->Questionnaire_utilisateur() as $questio_nnaire){
                        $utilisateur->Trouver_utilisateur($questio_nnaire['id_user']);
                        $questionnaire->getQuestionnaire($questio_nnaire['id_questionnaire']);
                         ?>
                         <tr>
                           <td><?=$questionnaire->titre; ?></td>
                           <td><?=$questio_nnaire['score'].' / '.$questionnaire->getQuestions()->num_rows;?></td>
                         </tr>
                      <?php } ?>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
<?php
}
 ?>
