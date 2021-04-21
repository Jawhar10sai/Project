<?php
$activequest="active";
include_once "ClassesInstance.php";
if (isset($_POST['ajout'])) {
  $questionnaire->titre = $_POST['titre'];
  $questionnaire->AjoutQuestionnaire();
}
if (isset($_POST['modification'])) {
$questionnaire->getQuestionnaire($_POST['modif_id']);
$questionnaire->titre = $_POST['modif_titre'];
$questionnaire->statut = $_POST['modif_statut'];
$questionnaire->ModifierQuestionnaire();
}
 ?>
 <style media="screen">
   label{
     font-size: 18px;
     font-family: 'Spartan';
   }
   td{
     font-size: 18px;
     font-family: 'Source Sans Pro';
   }
   h5{
     font-family: 'Open Sans';
   }
 </style>
 <?php include_once "navbar.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="row" style="margin:15px;">
        <h5 class="col-11">Liste des questionnaires</h5>
          <button type="button" class="btn btn-lg btn-primary" name="button" data-toggle="modal" data-target="#ajouterquestionnaire">+</button>
          <!-- Modal -->
          <div class="modal fade" id="ajouterquestionnaire" tabindex="-1" role="dialog" aria-labelledby="modalquestionnaire" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalquestionnaire">Ajouter questionnaire</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form  action="" method="post">
                    <div class="form-group">
                      <label for="">Titre du questionnaire</label>
                      <input type="text" class="form-control" name="titre">
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
      <table class="table table-bordered">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Questionnaire</th>
          <th class="text-center">Statut</th>
          <th class="text-center">Date de création</th>
          <th class="text-center">Nombre d'utilisateurs</th>
          <th class="text-center">Génerer un lien</th>
          <th class="text-center">Action</th>
        </tr>
        <?php
        if ($questionnaire->ListeQuestionnaire()) {
        foreach ($questionnaire->ListeQuestionnaire() as $liste){
           ?>
          <tr>
            <td class="text-center" ><?=$liste['id_questionnaire'];?></td>
            <td class="text-center"> <a href="questions.php?id=<?=$liste['id_questionnaire'];?>"><?=$liste['titre_questionnaire'];?></a></td>
            <td class="text-center"><?=$liste['statut_questionnaire'];?></td>
            <td class="text-center"><?=date('d/m/Y',strtotime($liste['date_creation'])); ?></td>
            <td class="text-center">
              <a href="#"  data-toggle="modal" data-target="#utilisateur<?=$liste['id_questionnaire'];?>">
                <?=$questionnaire->score_utilisateur($liste['id_questionnaire'])->num_rows; ?>
              </a>
              <div class="modal fade" id="utilisateur<?=$liste['id_questionnaire'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Liste des des utilisateurs qu'ils ont passés le questionnaire: <?=$liste['titre_questionnaire'];?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-stripped">
                        <tr>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Réponses</th>
                          <th>Score</th>
                        </tr>
                        <?php foreach ($questionnaire->score_utilisateur($liste['id_questionnaire']) as $utilisateurs){
                          $utilisateur->Trouver_utilisateur($utilisateurs['id_user']);
                          $questionnaire->getQuestionnaire($liste['id_questionnaire']);
                           ?>
                           <tr>
                             <td><?=$utilisateur->nom; ?></td>
                             <td><?=$utilisateur->prenom; ?></td>
                             <td><a href="utilisateurs.php?user_id=<?=$utilisateur->id; ?>&quest_id=<?=$questionnaire->id; ?>">Consulter les réponses</a></td>
                             <td><?=$utilisateurs['score'].' / '.$questionnaire->getQuestions()->num_rows;?></td>
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
            <td class="text-center">
              <button type="button" class="btn btn-info" name="button" data-toggle="modal" data-target="#genererlien<?=$liste['id_questionnaire'];?>">lien</button>
              <!-- Modal -->
              <div class="modal fade" id="genererlien<?=$liste['id_questionnaire'];?>" tabindex="-1" role="dialog" aria-labelledby="GLlabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="GLlabel">Génerer un lien vers le questionnaire</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row">
                          <?php
                          $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Questionnaire/";
                          echo $actual_link.$liste['id_questionnaire'];
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-warning" name="button" data-toggle="modal" data-target="#ModelModification<?=$liste['id_questionnaire'];?>">modifier</button>
              <!-- Modal -->
            <div class="modal fade" id="ModelModification<?=$liste['id_questionnaire'];?>" tabindex="-1" role="dialog" aria-labelledby="ModifLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModifLabel">Modifier le Questionnaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <?php $questionnaire->getQuestionnaire($liste['id_questionnaire']); ?>
                        <input type="hidden" class="form-control" name="modif_id" value="<?=$questionnaire->id;?>">
                      <div class="form-group">
                        <label for="">Titre du questionnaire</label>
                        <input type="text" class="form-control" name="modif_titre" value="<?=$questionnaire->titre;?>">
                      </div>
                      <div class="form-group">
                        <label for="">Statut du questionnaire</label>
                        <select class="form-control" name="modif_statut">
                          <option value="<?=$questionnaire->statut;?>"><?=$questionnaire->statut;?>
                          <option value="<?=$questionnaire->autre_statut();?>"><?=$questionnaire->autre_statut();?>
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
        <?php
          }
        }else {
          ?>
          <tr>
            <td colspan="7" class="text-center">Pas de questionnaire pour le moment!</td>
          </tr>
          <?php
        }
         ?>
      </table>
    </div>
  </div>
</div>
