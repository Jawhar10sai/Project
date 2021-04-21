<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');
if (isset($_POST['decoclient'])) {
$clients->deconnecte($_POST['idclient']);
header('location: ../index.php?p=ADuser');
}

 ?>
