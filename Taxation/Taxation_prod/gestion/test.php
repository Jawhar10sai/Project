<?php
include_once "control_utilisateur.php";
echo $client_lve->carnetEncours();
exit;
$motif = '';
$client_lve->AnnulerCarnet($motif);
