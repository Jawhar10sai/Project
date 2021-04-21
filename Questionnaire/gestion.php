<?php
include_once "ClassesInstance.php";
if (isset($_POST['poseder'])) {
  $utilisateur->nom=$_POST['nom'];
  $utilisateur->prenom=$_POST['prenom'];
  $questionnaire->getQuestionnaire($_POST['id_questionnaire']);
  if (!$questionnaire->UserPassed($utilisateur->Ajouter_utilisateur())) {
    $_SESSION['user_id']=$utilisateur->ID_utilisateur();
    $_SESSION['questionnaire_id']=$_POST['id_questionnaire'];
    header('location: Questionnaire');
  }else {
    $_SESSION['typage']="DP";
    header('location: Erreur');
  }
}
 ?>
