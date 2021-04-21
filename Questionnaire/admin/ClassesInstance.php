<?php
session_start();
/*---------------------------- Classes ------------------------------------*/
include_once "../classess/questionnaire.class.php";
include_once "../classess/utilisateur.class.php";
include_once "../classess/reponse.class.php";
include_once "../classess/reponseQuestionnaire.class.php";
include_once "../classess/question.class.php";
include_once "../classess/admins.class.php";

$questionnaire = new questionnaire;
$utilisateur = new Utilisateur;
$reponse = new reponse;
$question = new question;
$Reponse_questionnaire = new reponseQuestionnaire;
$admin = new Admins;
/*---------------------------- Styles ------------------------------------*/

include_once "styles.php";
/*---------------------------- Scripts -----------------------------------*/
include_once "scripts.php";
 ?>
