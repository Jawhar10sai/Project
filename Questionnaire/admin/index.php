<?php
include_once "ClassesInstance.php";
if (isset($_POST['connecter'])) {
  $admin->login = $_POST['login'];
  $admin->mot_de_passe = $_POST['mot_de_passe'];
  if ($admin->Connexion_admins()) {
    $_SESSION['login'] = $admin->login;
    $_SESSION['mot_de_passe'] = $admin->mot_de_passe;
    header('location: Questionnaires');
  }else {
    echo "
    <script>
      alert('Utilisateur ou mot de passe incorrect!');
    </script>
    ";
  }
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
    <style media="screen">
    .card-index{
      margin: 20px;
      padding: 20px;
      border-radius: 0.5rem;
      border: 1px solid #dc1e2d;
      background-color: #fff;
    }
    </style>
  </head>
  <body>
    <div class="container" style="padding-top:15%;">
      <div class="row">
        <div class="offset-md-3 col-md-6 col-xs-12 ">
          <div class="card-index" >
            <form action="" method="post">
              <input type="hidden" name="id_questionnaire" value="<?=$_GET['id']; ?>">
              <div class="col-12">
                <div class="form-group">
                  <label for="">Nom d'utilisateur:</label>
                  <input type="text" class="form-control" name="login">
                </div>
                <div class="form-group">
                  <label for="">Mot de passe:</label>
                  <input type="password" class="form-control" name="mot_de_passe">
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-lg btn-block btn btn-success" name="connecter">Passer au questionnaire</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
