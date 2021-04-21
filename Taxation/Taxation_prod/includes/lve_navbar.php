<?php
require_once "gestion/control_utilisateur.php";
$classhide = ($client_lve->CLIENT_TYP == "TR" || $client_lve->CLIENT_TYP == "TRL") ? "d-none" : "";
?>
<nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-dark" style="background-color:#fdfdfd;">
  <a class="navbar-brand" href="Consultation"> <img src="images/voielvej.png" height="60" alt=""> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= $consultation; ?>">
        <a class="nav-link <?= $classhide; ?>" href="Consultation" style="font-size:18px;"><i class="fa fa-eye" aria-hidden="true"></i> Consultaion</a>
      </li>
      <li class="nav-item <?= $declaration; ?>">
        <a class="nav-link <?= $classhide; ?>" href="Déclarations" style="font-size:18px;"><i class="fa fa-file" aria-hidden="true"></i> Déclarations</a>
      </li>
      <?php if ($_SESSION['type_utilisateur'] != "session") : ?>
        <li class="nav-item <?= $messess; ?>">
          <a class="nav-link " href="Mes_sessions" style="font-size:18px;"><i class="fa fa-user" aria-hidden="true"></i> Mes sessions</a>
        </li>
      <?php endif; ?>
      <li class="nav-item <?= $suivisenvois; ?>">
        <a class="nav-link" href="Tracking" style="font-size:18px;"><i class="fa fa-map-marker" aria-hidden="true"></i>
          Suivis des envois</a>
      </li>
      <li class="nav-item <?= $reclamation; ?>">
        <a class="nav-link <?= $classhide; ?>" href="Réclamations" style="font-size:18px;"><i class="fa fa-info-circle" aria-hidden="true"></i>
          Réclamations</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right ml-auto">
      <li class="nav-item <?= $classhide; ?>" style=" padding: 5px;border-radius:15px;background-color: #CCCCCC;">
        <a href="Panier" style="color:red;"><img src="images/cart.png" width="25" height="25" alt=""><span id="count" style="padding-left: 15px;color:#545454;font-size:25px;"></span></a>
      </li>
      <li class="nav-item dropdown <?= $navuser; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $nom_d_utilisateur; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <?php if ($_SESSION['type_utilisateur'] != "session") : ?>
            <a class="dropdown-item <?= $navuser; ?>" href="Profile"><span><i class="fas fa-user"></i></span>Profile</a>
          <?php endif; ?>
          <a class="dropdown-item" href="gestion/deconnexion.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<script type="text/javascript" src="assets/scripts/gestion-navbar.js"></script>