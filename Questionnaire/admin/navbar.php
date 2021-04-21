<?php
include_once "ClassesInstance.php";
if ($_SESSION['login']=="") {
  header('location: index.php');
}
$admin->login = $_SESSION['login'];
$admin->mot_de_passe = $_SESSION['mot_de_passe'];
$admin->Trouver_admins($admin->get_ID());
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$admin->nom." ".$admin->prenom; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mon profile</a>
          <a class="dropdown-item" href="decon.php">Se déconnecter</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?= $activequest;?>">
        <a class="nav-link" href="Questionnaire">Questionnaires</a>
      </li>
      <li class="nav-item <?= $activeutil;?>">
        <a class="nav-link" href="utilisateurs.php">Utilisateurs</a>
      </li>
    </ul>
  </div>
</nav>
