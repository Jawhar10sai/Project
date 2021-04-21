<?php
include_once "navbar.php";
include_once "ClassesInstance.php";
if (isset($_GET['id'])) {
$questionnaire->getQuestionnaire($_GET['id']);
}
if (isset($_POST['ajout'])) {
  $question->question = $_POST['question'];
  $question->id_questionnaire =  $_POST['questionnaire'];
  $question->Ajouter_question();
}
if (isset($_POST['modification'])) {
  $question->Trouver_Question($_POST['modif_id']);
  $question->question = $_POST['modif_question'];
  $question->Modifier_question();
}
 ?>
<div class="container">
  <div class="row">
    <h5 class="col-11">Les questions du questionnaire: <?=$questionnaire->titre;?></h5>
      <button type="button" class="btn btn-lg btn-primary" name="button" data-toggle="modal" data-target="#ajouterquestion">+</button>
      <div class="modal fade" id="ajouterquestion" tabindex="-1" role="dialog" aria-labelledby="modalquestion" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalquestion">Ajouter question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  action="" method="post">
                <input type="hidden" name="questionnaire" value="<?=$questionnaire->id;?>">
                <div class="form-group">
                  <label for="">Question</label>
                  <input type="text" class="form-control" name="question">
                </div>
                <div class="modal-footer">
                  <button type="submit" name="ajout"  class="btn btn-primary">Ajouter</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Question</th>
          <th>Action</th>
        </tr>
        <?php
          foreach ($questionnaire->getQuestions() as $questions){
          $question->Trouver_Question($questions['id_question']);
           ?>
          <tr>
            <td><?=$question->id; ?></td>
            <td><a href="reponses.php?id_questionn=<?=$questionnaire->id; ?>&id_quest=<?=$question->id; ?>"><?=$question->question;?></a></td>
            <td>
              <button type="button" class="btn btn-warning" name="button" data-toggle="modal" data-target="#ModelModification<?=$question->id; ?>">
                modifier
              </button>
              <div class="modal fade" id="ModelModification<?=$question->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModifLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModifLabel">Modifier la question</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                          <input type="hidden" class="form-control" name="modif_id" value="<?=$question->id;?>">
                        <div class="form-group">
                          <label for="">Titre du questionnaire</label>
                          <input type="text" class="form-control" name="modif_question" value="<?=$question->question;?>">
                        </div>
                      <div class="modal-footer">
                        <button type="submit" name="modification" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </form>
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
