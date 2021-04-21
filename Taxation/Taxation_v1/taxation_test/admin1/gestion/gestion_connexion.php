<?php
require_once('../../classes/fetchclas.php');
require_once('../../classes/conftaxDB.php');

if (isset($_POST['disconnect_client'])) {
$clients->deconnecte($_POST['idclient']);
header('location: ../index.php');
}
 ?>
