<?php
#Etat des carnets de ramassage et création d'un nouveau.
include_once "control_utilisateur.php";
$client_lve->CreerRamassage($_POST['idss'], $_POST['datera']);
