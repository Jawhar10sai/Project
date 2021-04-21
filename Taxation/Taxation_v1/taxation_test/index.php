<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once('txheads.php');
?>
<?php
if (isset($_SESSION['login'])) {
  if ($_SESSION['typuser']=="admin") {
    header('location:admin/index.php');
  }else
  header('location:declaration.php');
}
if (isset($_POST['nomuser'])) {
  $loginUsername=$_POST['nomuser'];
  $password=$_POST['mdpass'];

  $admins = $clients->connectadmin($loginUsername,$password);
  $users = $clients->connectuser($loginUsername,$password);
  $usagences = $agences->connectagence($loginUsername,$password);

  $admnbr = $admins->num_rows;
 $usnbr = $users->num_rows;
 $usagennbr = $usagences->num_rows;

if ($admnbr>0) {
  foreach ($admins as $admin) {
      #if ($clients->siconnecte($LoginR['CLIENT_ID'])==='de') {
        $_SESSION['login'] = $loginUsername;
        $_SESSION['typuser']="admin";
        header('location:admin1/index.php');
    }
}
if ($usnbr>0) {
  foreach ($users as $user) {
      if ($clients->siconnecte($user['CLIENT_ID'])==='de') {
        $_SESSION['login'] = $loginUsername;
        $_SESSION['user_id'] = $user['CLIENT_ID'];
        $_SESSION['usernom'] = $user['NOM'];
        $_SESSION['typuser']="clientlve";
        if ($_POST['sevenir']) {
          $_SESSION['mdpas'] = $user['mot_de_passe'];
        }
        $clients->connecte($user['CLIENT_ID']);
        header('location:declaration.php');
      }else {
        echo "<script>alert('Deja connecté');</script>";
      }
  }
}
if ($usagennbr>0) {
foreach ($usagences as $usagence) {
    if ($agences->siconnecte($usagence['AGENCE_COD'])==='de') {
      $_SESSION['login'] = $loginUsername;
      $_SESSION['user_id'] = $usagence['REFERENCIEE'];
      $_SESSION['usernom'] = $usagence['AGENCE_LIB'];
      $_SESSION['agcode'] = $usagence['AGENCE_COD'];
      $_SESSION['typuser']="agence";
      if ($_POST['sevenir']) {
        $_SESSION['mdpas'] = $usagence['MOT_D_PASS'];
      }
      $agences->connecte($usagence['AGENCE_COD']);
      header('location:declaration.php');
    }else {
      echo "<script>alert('Deja connecté');</script>";
    }
  }
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <style media="screen">
    #foot{
      background-color: #ffffff;
      border-radius: 5px;
      border: 1px solid;
    }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taxation - Identification</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
<div class="container">
  <div class="row text-center">
    <div class="col-lg-5 offset-lg-3 col-xs-12"><br>
      <img src="images/voielvej.png" alt="" >
      <img src="images/logo_certificat_iso_9001_afnor_nov_2012.png" alt="" width="70" height="70" >
    </div>
  </div>
   <div class="row text-center">
          <div class="col-lg-5 offset-lg-3 col-xs-12"><br>
      <br><form autocomplete="off" method="post" class="form-signin" action="index.php">
        <img class="mb-4" src="images/user.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Identification</h1>
        <label for="inputEmail" class="sr-only">Nom d'utilisateur:</label>
        <input type="text" id="inputEmail" class="form-control" name="nomuser" placeholder="Nom d'utilisateur" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe:</label>
        <?php if (isset($_SESSION['mdpas'])){
            $mddpp = $_SESSION['mdpas'];
          }else {
            $mddpp = "";
          }
          ?>

        <input type="password" id="inputPassword" name="mdpass" value="<?=$mddpp;?>" class="form-control" placeholder="Mot de passe" required>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" name="sevenir" > se souvenir de moi
          </label>
        </div>
        <button class="btn btn-lg col-12 btn-secondary btn-block" type="submit">Se connecter</button>
        </div>
        </div>

       <hr>
       <div class="row" id="foot">
            <div class="text-center col-lg-6 offset-lg-3">
               <p><span style="font-size: 8pt;">LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc; &ndash; Casablanca</span><br /><span style="font-size: 8pt;">RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073</span><br /><span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 </span><br /><span style="font-size: 8pt;">Site : <a href="http://www.lavoieexpress.com"> www.lavoieexpress.com</a> &ndash; E-mail ; client@lavoieexpress.ma </span><br /><span style="font-size: 8pt;">La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur. Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet. </span></p>
            </div>
       </div>
  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#inputEmail').focus();
  });
</script>
  </body>
</html>
