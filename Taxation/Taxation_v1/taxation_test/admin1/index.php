<?php
#session_start();
require_once "adheads.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
  if ($_SESSION['typuser']=="admin") {
    $ok='ok';
  }else {
    header('location: ../index.php');
  }

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La voie Express: Administration</title>
    <link rel="stylesheet" href="includes/indexstyle.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"/>
  </head>
  <body>
    <section class="admin-lve-section">
      <div class="admin-lve-sidebar">
        <div class="brand-sidebar">
          <b>La voie EXPRESS</b>
        </div>

        <a href="?p=ADuser">
          <i class="fas fa-user-circle"></i>Clients
        </a>
        <a href="?p=ADdeclaration">
          <i class="fas fa-file"></i> Déclarations
        </a>
        <a href="?p=ADAdresses">
          <i class="fas fa-map-marker-alt"></i>Adresses
        </a>
        <a href="?p=ADvilles">
          <i class="fas fa-city"></i>Villes
        </a>
        <a href="?p=ADpr">
          <i class="fas fa-store"></i>Points relais
        </a>
        <a href="?p=ADag">
          <i class="fas fa-store"></i>Agences
        </a>
        <a class="deconnect" href="../deco.php" style="bottom:0;position:absolute;width:300px;">
             <i class="fas fa-sign-out-alt"></i>Déconnecter
        </a>

      </div>
      <div class="admin-lve-content col-xs-12">
        <?php
           if (isset($_GET['p']))
            include ("pages/".$_GET['p'].".php");
            else {
              include ("pages/ADuser.php");
            }
            ?>
      </div>
    </section>
  </body>
</html>
