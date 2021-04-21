<?php
#Retourne le nombre des déclaration dans le panier.
if (!isset($_SESSION))
  session_start();
require_once('classes/fetchclas.php');

if (isset($_SESSION['user_id']))
  $client_lve = ClientLve::TrouverClient($_SESSION['user_id']);

echo count($client_lve->MesDeclarationsARamassees());
