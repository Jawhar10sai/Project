<?php
include_once "ClassesInstance.php";
if ($_GET['id']) {
  if ($questionnaire->getQuestionnaire($_GET['id'])) {
    if ($questionnaire->statut!='nouveau') {
      $_SESSION['typage']="CL";
      header('location: Erreur');
    }
  }else {
    $_SESSION['typage']="";
    header('location: Erreur');
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
    <title>Authentification</title>
    <?php
        include_once "styles.php";
        include_once "scripts.php";
    ?>
  </head>
  <body>
    <div class="container" style="padding-top:15%;">
      <div class="row">
        <div class="offset-md-3 col-md-6 col-xs-12 ">
          <div class="card-index" >
            <form action="gestion.php" method="post">
              <input type="hidden" name="id_questionnaire" value="<?=$_GET['id']; ?>">
              <div class="col-12">
                <div class="form-group">
                  <label for="">Nom:</label>
                  <input type="text" class="form-control" name="nom">
                </div>
                <div class="form-group">
                  <label for="">Prénom:</label>
                  <input type="text" class="form-control" name="prenom">
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-lg btn-block btn btn-success" name="poseder">Passer au questionnaire</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
