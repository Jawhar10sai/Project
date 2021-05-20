<?php
#session_start();
require_once "adheads.php";
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La voie Express: Administration</title>
    <link rel="stylesheet" href="assets/styles/indexstyle.css">
  </head>
  <body>
    <section class="admin-lve-section">
      <div class="admin-lve-sidebar">
        <div class="brand-sidebar">
          <img src="assets/images/46voielvej.png" alt="" >
        </div>
        <a href="statistiques">
          <i class="fas fa-chart-bar"></i> Accueil
        </a>
        <a href="Adresses">
          <i class="fas fa-map-marker-alt"></i> Adresses
        </a>
        <a href="Agences">
          <i class="fas fa-store"></i> Agences
        </a>
        <a href="Utilisateurs">
          <i class="fas fa-user-circle"></i> Clients
        </a>
        <a href="Declarations">
          <i class="fas fa-file"></i> Déclarations
        </a>
        <a href="PointsRelais">
          <i class="fas fa-store"></i> Points relais
        </a>
        <a href="Villes">
          <i class="fas fa-city"></i> Villes
        </a>
        <a href="Suivis">
          <i class="fas fa-store"></i> Suivis des envois
        </a>
        <a class="deconnect" href="../deco.php" style="bottom:0;position:absolute;width:300px;">
             <i class="fas fa-sign-out-alt"></i> Déconnecter
        </a>

      </div>
      <div class="admin-lve-content col-xs-12">
        <?php
        if ($_GET['p']) {
          if (isset($_GET['p']))
           include ("pages/".$_GET['p'].".php");
           else
             include ("pages/statistiques.php");
        }else
          include ("pages/statistiques.php");

            ?>
      </div>
    </section>
  </body>
</html>
