<?php
header('P3P: CP="CAO PSA OUR"');
#Retourne le nombre des déclaration dans le panier.
if (!isset($_SESSION)) {
  session_start();
}
require_once('classes/fetchclas.php');
require_once('classes/conftaxDB.php');
if (isset($_SESSION['user_id'])) {
  $client_lve->TrouverClient($_SESSION['user_id']);
}
echo $declarations->ARamassees($client_lve->CLIENT_ID);
 ?>
