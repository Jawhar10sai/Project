<?php
include_once "navbar.php";
include_once "ClassesInstance.php";
if (isset($_GET['id_questionn']) && isset($_GET['id_quest'])) {
$questionnaire->getQuestionnaire($_GET['id_questionn']);
$question->Trouver_Question($_GET['id_quest']);
}
if (isset($_POST['ajout'])) {
  $reponse->id_question = $_POST['question'];
  $reponse->reponse = $_POST['reponse'];
  $reponse->validite = $_POST['validite'];
  $reponse->Ajouter_reponse();
}
if (isset($_POST['modification'])) {
  $reponse->Trouver_reponses($_POST['modif_id']);
  $reponse->reponse = $_POST['modif_reponse'];
  $reponse->validite = $_POST['modif_validite'];
  $reponse->Modifier_reponse();
}
 ?>
<div class="container">
  <div class="row">
    <h5 class="col-11">Les réponses possible pour la question: " <?=$question->question;?>"</h5>
      <button type="button" class="btn btn-lg btn-primary" name="button" data-toggle="modal" data-target="#ajouterreponse">+</button>
      <div class="modal fade" id="ajouterreponse" tabindex="-1" role="dialog" aria-labelledby="modalquestion" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalquestion">Ajouter une réponse</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  action="" method="post">
                <input type="hidden" name="questionnaire" value="<?=$questionnaire->id;?>">
                <input type="hidden" name="question" value="<?=$question->id;?>">
                <div class="form-group">
                  <label for="">Réponse</label>
                  <input type="text" class="form-control" name="reponse">
                </div>
                <div class="form-group">
                  <label for="">Validité</label>
                  <select class="form-control" name="validite">
                    <option value="V">Valide</option>
                    <option value="F">Fausse</option>
                  </select>
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
          <th>Validité</th>
          <th>Action</th>
        </tr>
        <?php
          foreach ($question->getReponses() as $reponses){
          $reponse->Trouver_reponses($reponses['id_reponses']);
           ?>
          <tr>
            <td><?=$reponse->id; ?></td>
            <td><?=$reponse->reponse; ?></td>
            <td><?=$reponse->validite; ?></td>
            <td>
              <button type="button" class="btn btn-warning" name="button" data-toggle="modal" data-target="#ModelModification<?=$reponse->id; ?>">
                modifier
              </button>
              <div class="modal fade" id="ModelModification<?=$reponse->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModifLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModifLabel">Modifier la réponse</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                          <input type="hidden" class="form-control" name="modif_id" value="<?=$reponse->id;?>">
                        <div class="form-group">
                          <label for="">Réponse</label>
                          <input type="text" class="form-control" name="modif_reponse" value="<?=$reponse->reponse;?>">
                        </div>
                        <div class="form-group">
                          <label for="">Validité</label>
                          <select class="form-control" name="modif_validite">
                            <option value="<?=$reponse->validite;?>"><?=$reponse->validite;?>
                            <option value="<?=$reponse->autre_validite();?>"><?=$reponse->autre_validite();?>
                          </select>
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
