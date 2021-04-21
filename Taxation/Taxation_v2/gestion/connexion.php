<?php
#Gestion de la connexion des utilisateurs
if (!isset($_SESSION)) {
  session_start();
}
require_once "classes/fetchclas.php";
if (isset($_POST['nomuser'])) {
  $utilisateur->username = $_POST['nomuser'];
  $utilisateur->mot_de_passe = sha1($_POST['mdpass']);
    if ($utilisateur->est_client()) {
      if ($utilisateur->identite !="co") {
        $_SESSION['user_id'] = $utilisateur->id;
        $client_lve->TrouverClient($utilisateur->id);
        $client_lve->IDENTITE_TYP="co";
        $client_lve->ModifierClient($client_lve->NOM);
        $connexion->id_utilisateur = $client_lve->CLIENT_ID;
        $_SESSION['id_con'] = $connexion->Connecter();
        $_SESSION['type_utilisateur'] = "client";
        if ($client_lve->CLIENT_TYP == "TR")
          echo'Tracking';
        else
          echo "reussite";
      }else
        echo "deja co";
    }elseif ($utilisateur->est_admin()) {
      echo "non trouve";
    }elseif ($utilisateur->est_session()) {
      if ($utilisateur->identite!="co") {
        $messessions->TrouverSession($utilisateur->id);
        $messessions->IDENTITE_TYP="co";
        $messessions->ModifierSession($messessions->AGENCE_LIB);
        $_SESSION['user_id'] = $messessions->AGENCE_COD;
        $_SESSION['type_utilisateur'] = "session";
        echo "reussite";
      }else
        echo "deja co";
    }else
      echo "non trouve";
}

 ?>
