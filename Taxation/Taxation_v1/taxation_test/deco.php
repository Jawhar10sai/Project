<?php
require_once('txheads.php');
require_once('classes/fetchclas.php');
if (  $_SESSION['typuser']==="clientlve") {
  $clients->deconnecte($_SESSION['user_id']);
}elseif ($_SESSION['typuser']==="agence") {
  $agences->deconnecte($_SESSION['agcode']);
}

session_destroy();
header('location: index.php');
 ?>
