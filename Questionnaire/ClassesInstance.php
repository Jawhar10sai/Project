<?php
session_start();
include_once "classess/questionnaire.class.php";
include_once "classess/utilisateur.class.php";
include_once "classess/reponse.class.php";
include_once "classess/reponseQuestionnaire.class.php";
include_once "classess/question.class.php";

$questionnaire = new questionnaire;
$utilisateur = new Utilisateur;
$reponse = new reponse;
$question = new question;
$Reponse_questionnaire = new reponseQuestionnaire;
 ?>
