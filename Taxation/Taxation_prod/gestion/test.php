<?php
include_once "control_utilisateur.php";
$reclamation = new Reclamations;
$reclamation->user = 1; # $client_lve->CLIENT_ID;
#$reclamation->telFix = "test"; # $_POST['telFix'];
#$reclamation->telGSM = "test"; # $_POST['telGSM'];
$reclamation->numero = "E00003006"; # $_POST['nDeclaration'];
$reclamation->typeutil = "test"; # $_POST['expediteur'];
$reclamation->client = "test"; # $_POST['client'];
$reclamation->recTypeObjet = "test"; # $_POST['recTypeObjet'];
$reclamation->recObjet = "test"; # $_POST['recObjet'];
if ($reclamation->AjouterReclamation())
    echo "reclame";
