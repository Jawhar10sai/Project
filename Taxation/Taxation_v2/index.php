<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once('txheads.php');
#if (isset($_SESSION['user_id']))
#  echo "<script>history.go(-1);</script>";

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <style media="screen">
    /*
    *Afficher le formulaire sous format Mobile
    */
	@media(max-width:1020px){
	  #inputPassword{
		width: 100%;
	  }
    /*
    *Afficher le formulaire sous format Pc/Tablet
    */
    @media(min-width:1020px){
      .min-cont{
        display: none;
      }
    }
  body{
    background-color: #fff;
    margin: 0px;
    padding:0px;
    max-width: 100vw;
  }
  .min-cont input{
    max-width: 100vw;
    max-height: 100vh;
  }
  .min-cont #imgs{
    height: 30vh;
  }
  .min-cont form{
    height: 70vh;
  }
  .min-cont input{
    width: 100%;
  }
}
.btn-secondary{
  background-image: linear-gradient(115deg,#dc1e2d,#D5D8DC ,#dc1e2d ,#D5D8DC,#dc1e2d);
}
.btn-secondary:hover{
  background-image: linear-gradient(115deg,#dc1e2d,#dc1e2d ,#dc1e2d ,#dc1e2d,#dc1e2d);
}
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LVE - Identification</title>
    <link rel="stylesheet" href="assets/styles/style.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-10">
          <img src="images/voielvej.png" alt="" >
        </div>
        <div class="col-xs-12 col-md-2">
          <img src="images/Afaq_27001_outline.png" style="margin-top: 25px;" alt="" width="100" height="100" >
          <img src="images/logo_certificat_iso_9001_afnor_nov_2012.png" style="margin-top: 25px;" alt="" width="100" height="100" >
        </div>
      </div>
    </div>
<div class="container" id="indexdiv">
  <div class="offset-md-4 col-md-5 col-xs-12 mt-5">

    <div class="row text-center mt-5">
      <form autocomplete="off" method="post" class="form-signin" action="">
            <img class="mb-4" src="images/user.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Identification</h1>
            <label for="inputEmail" class="sr-only">Nom d'utilisateur:</label>
            <input type="text" id="inputEmail" class="form-control" name="nomuser" placeholder="Nom d'utilisateur" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe:</label>
            <?php
            if (isset($_SESSION['mdpas']))
                $mddpp = $_SESSION['mdpas'];
            else
                $mddpp = "";
              ?>
            <input type="password" id="inputPassword" name="mdpass" value="<?=$mddpp;?>" class="form-control" placeholder="Mot de passe" required>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" name="sevenir" >se souvenir de moi
              </label>
            </div>
            <button class="btn btn-lg col-12 btn-secondary btn-block btn-lve" type="submit" id="btn-connect"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
    		</form>
        </div>
        </div>
    </div>
  </div>
<?php include_once "includes/lve_footer.php"; ?>
